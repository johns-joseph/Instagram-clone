<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index(User $user)
    {
       //dire dump for debugging purpose only 
      //dd(User::find($user));
      //return view('home');

//      $user = User::findOrFail($user);   instead of this line we can pass it as function parameter
      return view('profiles\index' , [  'user' => $user]);
    }

    public function edit(User $user)
    {
      $this->authorize('update' , $user->profile);
      return view('profiles\edit' , compact('user'));
    }

    public function update(User $user)
    {

      $this->authorize('update' , $user->profile);

       $data=request()->validate(
         [
           'title' => '',
           'description' => '',
           'url' => '',
          'image'=>''
           
         ]
         );
  
     // dd($data);
       auth()->user()->profile->update($data);
      return redirect("/profile/{$user->id}") ;

    }
}

//   $user = User::findOrFail($user);   return view('profiles/index' , [  'user' => $user   ]);