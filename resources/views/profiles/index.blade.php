@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      
       <div class="col-3 pe-5">
        <img src="{{$user->profile->profileImage()}}"  class="rounded-circle w-100" style="height:260px;" >
       </div>
       
       <div class="col-9 pt-5" >
        
        <div class="d-flex justify-content-between align-items-baseline ">
         
         <div class="d-flex align-items-center pb-3">
           <div class="h4">{{ $user-> username }}</div>

           <follow-button user-id="{{ $user->id }}"></follow-button>

         </div>

          @can('update' , $user->profile)
         <a href="/p/create">Add new post</a>
          @endcan

        </div>
        @can('update' , $user->profile)
        <a href="/profile/{{$user->id}}/edit">Edit profile</a>
        @endcan

            <div class="d-flex">
               <div class="pr-3"><strong>{{ $user->posts->count()}}</strong> Posts</div>
               <div class="pr-3"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
               <div class="pr-3"><strong>900</strong> following</div>
            </div>

            <div class="pt-4 font-weight-bold">{{ $user->profile->title  }} </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->description  }}</div>
            <div><a href="#" >{{ $user->profile->url ?? 'N/A' }}</a></div>
       </div>
       
    </div>

    <div class="row pt-4">

    @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}"  style="height:450px;" class="w-100">
                </a>
            </div>
        @endforeach
      
    </div>


</div>


@endsection
<?php
//   {{ $user->profile->title  }}
/*

<div class="col-4"><img style="height:300px;" src="https://static.tvtropes.org/pmwiki/pub/images/blackwidow_endgameprofile.jpg" class="w-100"></div>
  
      <div class="col-4"><img style="height:300px;" src="https://static.tvtropes.org/pmwiki/pub/images/blackwidow_endgameprofile.jpg" class="w-100"></div>

      <div class="col-4"><img style="height:300px;" src="https://static.tvtropes.org/pmwiki/pub/images/blackwidow_endgameprofile.jpg" class="w-100"></div>

/storage{{$user->profile->image}}

*/

?>

