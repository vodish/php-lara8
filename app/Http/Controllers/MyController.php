<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    function __invoke() {
        return view('my');
    }

    function test() {
        return 'test';
    }
}
