<?php

namespace App\Http\Controllers;
use  Intervention\Image\Facades\Image;

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
         $image = Image::make(public_path("storage/{$imagePath}"));
         $image->save();

        

         auth()->user()->posts()->create(
             [
                 'caption' => $data['caption'] ,
                 'image' => $imagePath 
             ]
         );

         // dd($imagePath); test purpose only 

     return redirect('/profile/'.auth()->user()->id);

    }
    public function show(\App\Models\Post$post)
    {
        return view('posts\show' ,compact('post')) ;
    }
}


/*

 [ 'post' => $post ] = compact('post')

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