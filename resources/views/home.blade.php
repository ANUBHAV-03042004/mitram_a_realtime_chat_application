@extends('layouts.app')

@section('content')
<!-- in baraye chat -->
<div class="flexbox">
    <div class="user-wrapper">
        <ul class="users" style="text-align: center;">
            @if(empty($users))
                <div class="no-users-container">
                    <video
                        src="{{ asset('assets/img/bot2.webm') }}"
                        style="width: 400px; height: 200px; margin: 0 auto;"
                        autoplay
                        loop
                        muted
                    ></video>
                    <p class="no-users">Make friends with Mitr</p>
                </div>
            @else
                @foreach($users as $user)
                    <li class="user" id="{{ $user->id }}">    
                        <div class="media-body">
                            <p class="name">{{ $user->name }}</p>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="col-md-8 msgbox" id="messages">
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <img src="{{ asset('assets/img/logo_mitram.png') }}" alt="mitram_logo" style="width: 100%; height: 50%; margin: 0 auto; display: block;">
                <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script src="{{ asset('assets/fontawesome/js/all.js') }}"></script>
 
    @vite('resources/js/app.js')
@endsection

<style>
    .media-body p {
        width: 100%; 
        font-size: 25px !important;
        margin: 0 auto;
        padding: 10px 0;
        transition: transform 0.3s ease, color 0.3s ease;
    }
    .media-body p:hover {
        color: #13915b;
    }
    .user-wrapper {
        background-color: #13915b;
        height: 91vh !important;
        width: 25vw;
        overflow: auto; 
    }
    .flexbox {
        display: flex;
    }
    .msgbox {
        height: 91vh !important;
        width: 75vw;
        background-color: #000;
    }
    .messages-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        text-align: center;
    }
    .no-users-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 100%;
    }
    .no-users {
        font-size: 20px;
        color: #fff;
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }
    .message-hint {
        color: #fff;
        font-size: 18px;
        margin-top: 20px;
    }
    .user {
        transition: background-color 0.3s ease;
        border-bottom: 2px solid black;
    }
    .user:hover {
        background-color: #000 !important; /* Black background on hover */
        color:#13915b !important;
        border-bottom: 2px solid white;
    }
</style>