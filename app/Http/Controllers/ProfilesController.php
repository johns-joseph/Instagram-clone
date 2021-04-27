<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use  Intervention\Image\Facades\Image;
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
  

       if(request('image'))
       {
          $imagePath = request('image') ->store('profile' , 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();

        $imageArray = ['image' => $imagePath];

       }

      


       auth()->user()->profile->update( array_merge(  $data ,  $imageArray ?? [] ));

          //dd( array_merge(  $data ,  $imageArray ?? [] ) );       

      return redirect("/profile/{$user->id}") ;

    }
}

//   $user = User::findOrFail($user);   return view('profiles/index' , [  'user' => $user   ]); 