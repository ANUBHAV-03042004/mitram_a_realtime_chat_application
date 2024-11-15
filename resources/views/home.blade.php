@extends('layouts.app')

@section('content')
<!-- in baraye chat -->
<div class="flexbox">
<div class="user-wrapper"> 
            <ul class="users" style='text-align: center;'>
                @foreach($users as $user)
                <li class="user" id="{{ $user->id }}">    
                   <div class="media-body">
                    <p class="name">{{ $user->name }}</p>
                   </div>
                    </li>
                        @endforeach
                    </ul>
</div>
<div class="col-md-8 msgbox" id="messages">
    
</div>
</div>
@endsection
<style>
    .media-body p{
         height:6vh;
         width:25vw;
         border-bottom:2px solid black;
         font-size:25px !important;
    }
    .media-body p:hover{
        transform:scale(1.2);
    }
    .user-wrapper{
background-color: #27a776;
height:91vh !important;
width:25vw;
    }
    .flexbox{
        display:flex;
    }
    .msgbox{
        height:91vh !important;
        width:75vw;
        background-color: #000;
    }
  
</style>