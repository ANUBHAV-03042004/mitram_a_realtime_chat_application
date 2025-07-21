<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-MitRam</title>
      <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
</head>
<x-app-layout>
<div class="chart">
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: white;">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="row">
            @if($users->isNotEmpty())
                <div class="col-md-3">
                    <ul class="list-group">
                        @foreach($users as $singleUser)
                            @php
                            $image = $singleUser->avatar ? asset('storage/users-avatar/' . $singleUser->avatar) : asset('storage/users-avatar/avatar.png');
                            @endphp
                            <li class="list-group-item list-group-item-custom cursor-pointer user-list fd">
                                <img src="{{ $image }}" class="user-image" alt="">
                               <div class="user-name">{{ $singleUser->username }} ({{ $singleUser->name }}) 
                                <b><sup><span  class="status {{ $singleUser->active_status ? 'online' : 'offline' }}">
                                 {{ $singleUser->active_status ? 'online' : 'offline' }}</span></sup></b>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="col-md-12">
                    <h6>No other users found</h6>
                </div>
            @endif
        </div>
    </div>
    </div>
</x-app-layout>
<style>
    *{
        margin:0;
        padding:0;
    }
    .chart{
        height:100vh;
        width:100vw;
        background-color: #000000 !important;
        transform:translateY(-15px);
    }
    .fd{
        display:flex;
        margin-top:12px;
        margin-left:20px;
        height:62px;
        width:400px;
        transform:translateY(15px);
        color:black;
        background-color:white;
border-radius:10px;
    }
    .user-image{
        height:50px;
        width:50px;
        border-radius:25px;
        margin-top:4px;
        margin-left:8px;
    }
    .user-name{
        margin-top:15px;
        margin-left:7px;
    }
    .status {
            font-weight: bold;
            padding: 2px 5px;
            border-radius: 3px;
        }
        .online {
            color: blue;
        }
        .offline {
            color: red;
        }
</style>

<script>
        function updateStatus(userId, isActive) {
            const statusElement = document.getElementById(`status-${userId}`);
            if (statusElement) {
                if (isActive) {
                    statusElement.textContent = 'online';
                    statusElement.className = 'status online';
                } else {
                    statusElement.textContent = 'offline';
                    statusElement.className = 'status offline';
                }
            }
        }

        // Example usage:
        // updateStatus(1, true);  // Set user 1 to online
        // updateStatus(0, false); // Set user 0 to offline
    </script>