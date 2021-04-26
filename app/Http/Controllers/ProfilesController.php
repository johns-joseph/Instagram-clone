<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index($user)
    {
       //dire dump for debugging purpose only 
      //dd(User::find($user));
      //return view('home');

      $user = User::findOrFail($user);   
      return view('profiles\index' , [  'user' => $user]);
    }
}

//   $user = User::findOrFail($user);   return view('profiles/index' , [  'user' => $user   ]);