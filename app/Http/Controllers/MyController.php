<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    function __invoke() {
        return 'MyController: ' .time();
    }

    function test() {
        return 'test';
    }
}
