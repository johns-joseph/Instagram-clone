<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use views\posts;

class PostsController extends Controller
{
    //
    public function __construct()
    {
   $this->middleware('auth');
      
    }


    public function create()
    {
        return view('posts\create');        
    }

    public function  store()
    {
         $data = request()->validate(
           [
               'caption' => 'required' ,
               'image'  => ['required' , 'image']
           ]  
         ) ;

         $imagePath = request('image') ->store('uploads' , 'public');
         auth()->user()->posts()->create(
             [
                 'caption' => $data['caption'] ,
                 'image' => $imagePath 
             ]
         );
     return redirect('/profile/'.auth()->user()->id);

    }
}


/*
      dd(request('image')-> store('uploads' , 'public')); 
         auth()->user()->posts()->create($data);
         dd(request()->all()) ;  // view image in browser  /storage/uploads


 $imagePath = request('image') ->store('uploads' , 'public');


         //dd(request('image')-> store('uploads' , 'public'));

         auth()->user()->posts()->create(
             [
                 'caption' => $data['caption'] ,
                 'image' => $imagePath 
             ]
         );

             dd(request()->all());
          //  return redirect('/profile/'.auth()->user()->id);

*/