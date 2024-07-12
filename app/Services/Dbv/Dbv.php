<?php

namespace App\Services\Dbv;

use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class Dbv
{
    public    $connect;
    public  $dsn;
    public    $statement;
    public    $error;
    public  $sqlText;
    public  $log;


    public function __construct()
    {
        return;

        // $dsn    =   'mysql:host=localhost;port=3306;dbname=taris;charset=utf8mb4;';
        // $user   =   'sdv';
        // $pass   =   'sdv';
        // try {
        //     $this->dsn      =   $dsn;
        //     @$this->connect =   new \PDO($dsn, $user, $pass, [\PDO::ATTR_EMULATE_PREPARES => true]);
        // } catch (\Exception $e) {
        //     echo '<b>Cant connect to db...</b><br />';
        //     die($e->getMessage() ?? '');
        // }
    }

    public function test()
    {
        return 'Строка из класса ' . $this::class;
    }


    public function select($sql, $params = [])
    {
        $this->query($sql, $params);

        $data  =   $this->statement->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }


    public function one($sql, $params = [])
    {
        $this->query($sql, $params);

        $data  =   $this->statement->fetch(\PDO::FETCH_ASSOC);


        return $data ? $data : array();
    }


    public function query($sql, $params = [])
    {
        $sqlText       =   $this->sqlText($sql, $params);
        $start         =   microtime(true);


        try {
            $this->statement  =   $this->connect->prepare($sql);
        } catch (\Exception $err) {
            $this->printSql($err->getMessage(), $sqlText);
        }

        if ( isset($err) )  return;

        try {
            $this->statement->execute($params) || $this->printSql('', $sqlText);
        } catch (\Exception $err) {
            $this->printSql($err->getMessage(), $sqlText);
        }

        $finish        =   microtime(true);
        $this->log[]   =   array($sql, ($finish - $start));
    }


    public function fetch()
    {
        $data  =   $this->statement->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }


    public function lastId()
    {
        return $this->connect->lastInsertId();
    }

    # escape 
    #
    public function v($val)
    {
        if (is_null($val))   return 'NULL';
        if (is_int($val))   return $val;

        return $this->connect->quote($val);
    }





    # sql text with params into sql for debug
    #
    private function sqlText($sql, $params)
    {
        foreach ($params as $k => $v) {
            $k     =   strpos($k, ':') === false ?  ':' . $k  :  $k;
            $v     =   is_string($v) ?  $this->connect->quote($v) : $v;
            $v     =   is_null($v) ?  'NULL' : $v;

            $sql   =   str_replace($k, ($v . '/*' . $k . '*/'), $sql);
        }

        $sql .= "\n";
        $sql .= "params: ". json_encode($params);

        return $sql;
    }


    public function printSql($errorMessage, $sqlText)
    {
        if (!config('app.debug'))     return;

        echo '<p style="color: maroon; padding: 0 1em;">' .$errorMessage. '</p>';
        echo '<pre style="color: maroon; padding: 0 1em;">';
        print_r($sqlText);
        echo '</pre>';
    }

    # escape " for attribute value: value="?"
    #
    public function v2input($value)
    {
        return    str_replace('"', '&#034;', $value);
    }


    # для php7 преобразовать типы
    # $types = array( 'int'=>['field_name', 'field_name'...], 'str'=>['field_name', 'field_name'...] )
    #
    public function cast(&$row, array $types)
    {
        if (empty($row))    return $row;


        foreach (['int', 'str'] as $type) {
            if (!isset($types[$type]))        continue;

            foreach ($types[$type] as $key) {
                if ($row[$key] === null)    continue;

                if ($type == 'int')    $row[$key]    =    intval($row[$key]);
                if ($type == 'str')    $row[$key]    =    strval($row[$key]);
            }
        }
    }
}
