<?php

namespace App\Services\My;

class My
{
    public function test()
    {
        return 'Строка из класса '. $this::class;
    }
}
