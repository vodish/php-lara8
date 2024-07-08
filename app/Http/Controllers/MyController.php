<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    function __invoke()
    {
        
        // $user = User::query()->where('id', 111)->first();
        // dd($user);
        
        

        return 'MyController: ' . time();
    }

    function test()
    {
        return 'test';
    }
}
