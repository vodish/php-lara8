<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    function __invoke()
    {
        
        // $user = User::query()->where('id', 111)->first()->toArray();
        // dd($user);
        
        // dd();
        

        // return 'MyController: ' . time();
        return view('my');
    }

    function test()
    {
        return 'test';
    }
}
