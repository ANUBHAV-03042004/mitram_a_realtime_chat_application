@extends('layouts.app')

@section('content')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Remove user</div>

               
                    @foreach ($group_members as $group_member)
                    <div class="card-body">
                        @if ($group_member->id == auth()->user()->id)
                            <p>{{$group_member->name}} </p>
                        @else
                            <p>{{$group_member->name}}  {{$group_id}}/{{$group_member->id}}<small > <a class="text-danger" href="/remove_user/{{$group_id}}/{{$group_member->id}}" onclick="return confirm('Are  you sure?')"> Remove </a></small> </p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .container{
        background-color:#87ceeb;
        height:91%;
        width:100%;
    }
    .card-header{
        text-align: center;
        font-size: 30px;
        background-color:black;
        color:white;       
    }
    .card-body{
       text-align:center;
        margin-top:10px;
        font-size:25px;
        background-color:white;
    }
    .text-danger{
        text-decoration: underline;
        color:red;
    }
</style>