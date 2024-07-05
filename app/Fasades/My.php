<?php
namespace App\Fasades;

use Illuminate\Support\Facades\Facade;

class My extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'my';
    }
}


