@extends('layouts.app')

@section('content')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="container">
            <div class="card">
                <div class="card-header">{{ __('Edit Group Name') }}</div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/group/update/{{$group->id}}">
                        @csrf

                        <div class="form-gro">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$group->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> <br>

                        <button type="submit" class="btn-23">
                                <span class="text">Edit</span>
                                <span aria-hidden="" class="marquee">Edit</span>
                                </button>
                    </form>

                </div>
            </div>
@endsection
<style>
   .container {
    background-color: #fff;
    height: 91vh;
    width: 100vw;
    padding: 50px 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.form-gro input{
    width:30vw;
    color:black;
    border:2px solid black;
}
.card {
    background-color: #000;
    color: white;
    height: 50px;
    width: 30vw;
    text-align: center;
    font-size: 30px;
    margin-bottom:0px;
}
.card-header{
    transform:translateY(2px);
}
.alert{
    color:black;
}
.form-gro{
    transform:translateY(50px);
} 
/* From Uiverse.io by doniaskima */ 
.btn-23,
.btn-23 *,
.btn-23 :after,
.btn-23 :before,
.btn-23:after,
.btn-23:before {
  border: 0 solid;
  box-sizing: border-box;
}

.btn-23 {
  -webkit-tap-highlight-color: transparent;
  -webkit-appearance: button;
  background-color: #000;
  background-image: none;
  color: #fff;
  cursor: pointer;
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
    Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
    Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
  font-size: 100%;
  font-weight: 900;
  line-height: 1.5;
  margin: 0;
  -webkit-mask-image: -webkit-radial-gradient(#000, #fff);
  padding: 0;
  text-transform: uppercase;
}

.btn-23:disabled {
  cursor: default;
}

.btn-23:-moz-focusring {
  outline: auto;
}

.btn-23 svg {
  display: block;
  vertical-align: middle;
}

.btn-23 [hidden] {
  display: none;
}

.btn-23 {
  border-radius: 99rem;
  border-width: 2px;
  overflow: hidden;
  padding: 0.8rem 3rem;
  position: relative;
  height:70px;
  width:200px;
  transform:translateY(100px);
}

.btn-23 span {
  display: grid;
  inset: 0;
  place-items: center;
  position: absolute;
  transition: opacity 0.2s ease;
}

.btn-23 .marquee {
  --spacing: 5em;
  --start: 0em;
  --end: 5em;
  -webkit-animation: marquee 1s linear infinite;
  animation: marquee 1s linear infinite;
  -webkit-animation-play-state: paused;
  animation-play-state: paused;
  opacity: 0;
  position: relative;
  text-shadow: #fff var(--spacing) 0, #fff calc(var(--spacing) * -1) 0,
    #fff calc(var(--spacing) * -2) 0;
}

.btn-23:hover .marquee {
  -webkit-animation-play-state: running;
  animation-play-state: running;
  opacity: 1;
}

.btn-23:hover .text {
  opacity: 0;
}

@-webkit-keyframes marquee {
  0% {
    transform: translateX(var(--start));
  }

  to {
    transform: translateX(var(--end));
  }
}

@keyframes marquee {
  0% {
    transform: translateX(var(--start));
  }

  to {
    transform: translateX(var(--end));
  }
}

</style>
