@extends('layouts.app')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">{{ __('Group List') }}</div>
</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($groupALL as $user)
                    <div class="card-play">
                    <form method="POST" action="/group/join">
                        @csrf
                 <div class="form-gro">
                            <label for="code" >{{ $user->name }}</label> 
                 <input id="code" type="hidden" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $user->code }}" required autocomplete="name" autofocus>  
                        </div><br>
                                <button type="submit" class="btn-23">
                                <span class="text">JOIN</span>
                                <span aria-hidden="" class="marquee">JOIN</span>
                                </button>
                    </form>
                    @endforeach
                </div>
            
</div>
@endsection
<style>
.container {
    background-color: #27a776;
    height: 91vh;
    width: 100vw;
    padding: 50px 0;
    display: flex;
    flex-direction: column;
    align-items: center;
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

.card-play {
    margin-top: 6px;
    color: white;
    font-size: 18px;
    background-color: #000;
    height: 120px;
    width: 30vw;
    text-align: center;
    margin-bottom: 10px;
}
.card-header{
    transform:translateY(2px);
}

.alert{
    color:white;
}
.form-gro{
    transform:translateY(8px);
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
  height:50px;
  width:50px;
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