@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      
       <div class="col-3 pe-5">
        <img src="/svg/nat.jpg"   style="border-radius:50%" >
       </div>
       
       <div class="col-9 pt-5" >
        
        <div class="d-flex justify-content-between align-items-baseline ">
         <div><h1>
          Natasha romanoff

         </h1></div>
         <a href="#">Add new post</a>
        </div>

            <div class="d-flex">
               <div class="pr-3"><strong>900</strong> Posts</div>
               <div class="pr-3"><strong>900</strong> followers</div>
               <div class="pr-3"><strong>900</strong> following</div>
            </div>

            <div class="pt-4 font-weight-bold"> 
              Rogue One
            </div>
            <div class="pt-4 font-weight-bold">
            Whatever happens in Budapest, stays in Budapest
            </div>
            <div><a href="#" >
             www.meetup.com
            </a></div>
       </div>
       
    </div>

    <div class="row pt-4">
      <div class="col-4"><img style="height:300px;" src="https://static.tvtropes.org/pmwiki/pub/images/blackwidow_endgameprofile.jpg" class="w-100"></div>
  
      <div class="col-4"><img style="height:300px;" src="https://static.tvtropes.org/pmwiki/pub/images/blackwidow_endgameprofile.jpg" class="w-100"></div>

      <div class="col-4"><img style="height:300px;" src="https://static.tvtropes.org/pmwiki/pub/images/blackwidow_endgameprofile.jpg" class="w-100"></div>


    </div>


</div>

<?php
# {{ $user-> username }}

# {{ $user->profile->title  }}

# {{ $user->profile->url ?? 'N/A' }}

#  {{ $user->profile->description  }}

?>


@endsection
