<?php

namespace App\Http\Controllers;

use App\Fasades\Dbv;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class MyController extends Controller
{
    function __invoke(Request $request)
    {
        // return redirect()->route('main', ['param'=>'qqq']);
        // $token = $request->query('token');
        // $token = $request->input('token');
        // $token = $request->bearerToken();
        // dd(Hash::make('sdvsdv')); 

        dump(Dbv::one("SELECT * FROM `users` WHERE `id` = &id", ['id'=>2])); 

        // Auth::attempt([], true);
        // Auth::login();
        // Auth::logout();
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
