<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login- Mitram</title>
      <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <body>
    <div id="Container">
        <form class="form" method="post" action="{{ route('login') }}">
            @csrf
            <div id="login-lable">Login</div> 
            <input id='email' class="form-content" type="email" placeholder="Email" name="email" value="{{old('email')}}" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="error-message" />
            
            <input id="password" class="form-content" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="error-message"/>
            
            <button>Login</button>
            
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="check">
                <span class="ml-2 text-sm" style="color: white;">{{ __('Remember me') }}</span>
            </label>
            
            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <p class="small mb-0">Forgotten your password? <a href="{{ route('password.request') }}" class="underline-link">Forgot password</a></p>
                @endif
                <p class="small mb-0">Don't have an account? <a href="{{ url('register') }}" class="underline-link">Create an account</a></p>
            </div>    
        </form>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
            margin: 0;
            background-color: black;
        }

        #Container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            height: 100%;
        }

        .form {
            position: relative;
            width: 26rem;
            top: 5em;
            padding: 12%;
            z-index: 3;
            display: flex;
            flex-direction: column;
            border-radius: 0.5rem;
            border: 4px solid #fff;
            background: rgba(39, 167, 118, 0.52);
            box-shadow: 0px 0px 64px 0px #27a776 inset, 0px 0px 16px #27a776a6;
            backdrop-filter: blur(3.5px);
            gap: 1em;
            animation: float 2s ease-in-out infinite;
        }

        #login-lable {
            text-align: center;
            color: white;
            font-size: 6rem;
            font-weight: 600;
            letter-spacing: 8px;
            text-shadow: 0px 0px 16px rgb(243, 243, 243);
        }

        .form-content {
            height: 3em;
            padding: 1px 8px;
            color: white;
            text-decoration: none;
            letter-spacing: 1px;
            font-weight: bold;
            border-radius: 6px;
            border: 2px solid #fff;
            background: rgba(39, 167, 118, 0.486);
            box-shadow: 0px 0px 1px 3px #27a776 inset, 0px 4px 4px 0px #181a6040;
            text-shadow: 0px 1px 4px rgb(243, 243, 243);
        }

        .form-content:focus-visible {
            outline: none;
            box-shadow: 0 0 0 2px olive;
        }

        .form-content:hover {
            background: rgba(21, 99, 69, 0.59);
        }

        ::placeholder {
            font-weight: 300;
            color: white !important;
            letter-spacing: 0.1rem;
            text-shadow: 0px 1px 5px rgb(66, 66, 66);
            opacity: 1;
        }

        .form button {
            cursor: pointer;
            height: 3.5rem;
            padding: 0%;
            color: white;
            font-size: 1.5em;
            letter-spacing: 0.3rem;
            border: 2px solid white;
            background: linear-gradient(144deg, #27a776ce, #27a776b6 50%, #27a776bb);
        }

        .form button:hover {
            position: relative;
            bottom: 4px;
            background: linear-gradient(144deg, #27a776, #27a776 50%, #27a776);
            box-shadow: 0px 0px 2px 2px #ffffff;
        }
  /* error */
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        .underline-link {
            text-decoration: underline;
            color: white;
        }



        @keyframes float {
            0%, 100% { position: relative; }
            50% { top: 50px; }
        }

        @keyframes rays {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }
    </style>
  <div id="rays">
    <svg
      fill="none"
      viewBox="0 -25 299 152"
      height="9em"
      width="18em"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        fill="url(#paint0_linear_8_3)"
        d="M149.5 152H133.42L9.53674e-07 4.70132e-06H149.5L299 4.70132e-06L165.58 152H149.5Z"
      ></path>
      <defs>
        <linearGradient
          gradientUnits="userSpaceOnUse"
          y2="12.1981"
          x2="150.12"
          y1="152"
          x1="149.5"
          id="paint0_linear_8_3"
        >
        <stop stop-color="#27a776"></stop>
<stop stop-opacity="0" stop-color="#27a776" offset="1"></stop>
        </linearGradient>
      </defs>
    </svg>
  </div>

  <div id="emiter">
    <svg
      fill="none"
      viewBox="0 0 160 61"
      height="180"
      width="280"
      xmlns="http://www.w3.org/2000/svg"
    >
      <g filter="url(#filter0_di_1_38)">
        <path
          fill="#2B2B2B"
          d="M80 27.9997C121.974 27.9997 156 22.4032 156 15.4996L156 40.4998C156 47.4034 121.974 52.9998 80 52.9998C38.0265 52.9998 4.00028 47.4034 4 40.4998V40.4998V15.51C4.0342 22.4089 38.0474 27.9997 80 27.9997Z"
          clip-rule="evenodd"
          fill-rule="evenodd"
        ></path>
      </g>
      <ellipse
        fill="url(#paint0_radial_1_38)"
        ry="4.80773"
        rx="28.3956"
        cy="17.4236"
        cx="80"
      ></ellipse>
      <g filter="url(#filter1_i_1_38)">
        <path
          fill="#323232"
          d="M80 28.0002C121.974 28.0002 156 22.4037 156 15.5001C156 8.59648 121.974 3 80 3C38.0264 3 4 8.59648 4 15.5001C4 22.4037 38.0264 28.0002 80 28.0002ZM80.0001 20.308C96.1438 20.308 109.231 18.1555 109.231 15.5002C109.231 12.845 96.1438 10.6925 80.0001 10.6925C63.8564 10.6925 50.7693 12.845 50.7693 15.5002C50.7693 18.1555 63.8564 20.308 80.0001 20.308Z"
          clip-rule="evenodd"
          fill-rule="evenodd"
        ></path>
      </g>
      <g filter="url(#filter2_di_1_38)">
        <path fill="#27a776" d="M106.725 17.4505C108.336 16.8543 109.231 16.1943 109.231 15.4999C109.231 12.8446 96.1438 10.6921 80.0001 10.6921C63.8564 10.6921 50.7693 12.8446 50.7693 15.4999C50.7693 16.1943 51.6645 16.8543 53.2752 17.4504C53.275 17.4414 53.2748 17.4323 53.2748 17.4232C53.2748 14.768 65.2401 12.6155 80.0001 12.6155C94.7601 12.6155 106.725 14.768 106.725 17.4232C106.725 17.4323 106.725 17.4414 106.725 17.4505Z"
          clip-rule="evenodd"
          fill-rule="evenodd"
        ></path>
      </g>
      <defs>
        <filter
          color-interpolation-filters="sRGB"
          filterUnits="userSpaceOnUse"
          height="45.5002"
          width="160"
          y="15.4996"
          x="0"
          id="filter0_di_1_38"
        >
          <feFlood result="BackgroundImageFix" flood-opacity="0"></feFlood>
          <feColorMatrix
            result="hardAlpha"
            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
            type="matrix"
            in="SourceAlpha"
          ></feColorMatrix>
          <feOffset dy="4"></feOffset>
          <feGaussianBlur stdDeviation="2"></feGaussianBlur>
          <feComposite operator="out" in2="hardAlpha"></feComposite>
          <feColorMatrix
            values="0 0 0 0 0.620833 0 0 0 0 0.620833 0 0 0 0 0.620833 0 0 0 0.25 0"
            type="matrix"
          ></feColorMatrix>
          <feBlend
            result="effect1_dropShadow_1_38"
            in2="BackgroundImageFix"
            mode="normal"
          ></feBlend>
          <feBlend
            result="shape"
            in2="effect1_dropShadow_1_38"
            in="SourceGraphic"
            mode="normal"
          ></feBlend>
          <feColorMatrix
            result="hardAlpha"
            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
            type="matrix"
            in="SourceAlpha"
          ></feColorMatrix>
          <feOffset></feOffset>
          <feGaussianBlur stdDeviation="8"></feGaussianBlur>
          <feComposite
            k3="1"
            k2="-1"
            operator="arithmetic"
            in2="hardAlpha"
          ></feComposite>
          <feColorMatrix
            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 1 0"
            type="matrix"
          ></feColorMatrix>
          <feBlend
            result="effect2_innerShadow_1_38"
            in2="shape"
            mode="normal"
          ></feBlend>
        </filter>
        <filter
          color-interpolation-filters="sRGB"
          filterUnits="userSpaceOnUse"
          height="25.0002"
          width="152"
          y="3"
          x="4"
          id="filter1_i_1_38"
        >
          <feFlood result="BackgroundImageFix" flood-opacity="0"></feFlood>
          <feBlend
            result="shape"
            in2="BackgroundImageFix"
            in="SourceGraphic"
            mode="normal"
          ></feBlend>
          <feColorMatrix
            result="hardAlpha"
            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
            type="matrix"
            in="SourceAlpha"
          ></feColorMatrix>
          <feMorphology
            result="effect1_innerShadow_1_38"
            in="SourceAlpha"
            operator="erode"
            radius="3"
          ></feMorphology>
          <feOffset></feOffset>
          <feGaussianBlur stdDeviation="6.5"></feGaussianBlur>
          <feComposite
            k3="1"
            k2="-1"
            operator="arithmetic"
            in2="hardAlpha"
          ></feComposite>
          <feColorMatrix
            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 1 0"
            type="matrix"
          ></feColorMatrix>
          <feBlend
            result="effect1_innerShadow_1_38"
            in2="shape"
            mode="normal"
          ></feBlend>
        </filter>
        <filter
          color-interpolation-filters="sRGB"
          filterUnits="userSpaceOnUse"
          height="16.7583"
          width="78.4615"
          y="0.692139"
          x="40.7693"
          id="filter2_di_1_38"
        >
          <feFlood result="BackgroundImageFix" flood-opacity="0"></feFlood>
          <feColorMatrix
            result="hardAlpha"
            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
            type="matrix"
            in="SourceAlpha"
          ></feColorMatrix>
          <feMorphology
            result="effect1_dropShadow_1_38"
            in="SourceAlpha"
            operator="dilate"
            radius="2"
          ></feMorphology>
          <feOffset></feOffset>
          <feGaussianBlur stdDeviation="4"></feGaussianBlur>
          <feComposite operator="out" in2="hardAlpha"></feComposite>
          <feColorMatrix
          values="0 0 0 0 0.152941 0 0 0 0 0.654902 0 0 0 0 0.462745 0 0 0 1 0"
            type="matrix"
          ></feColorMatrix>
          <feBlend
            result="effect1_dropShadow_1_38"
            in2="BackgroundImageFix"
            mode="color-dodge"
          ></feBlend>
          <feBlend
            result="shape"
            in2="effect1_dropShadow_1_38"
            in="SourceGraphic"
            mode="normal"
          ></feBlend>
          <feColorMatrix
            result="hardAlpha"
            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
            type="matrix"
            in="SourceAlpha"
          ></feColorMatrix>
          <feMorphology
            result="effect2_innerShadow_1_38"
            in="SourceAlpha"
            operator="erode"
            radius="1"
          ></feMorphology>
          <feOffset></feOffset>
          <feGaussianBlur stdDeviation="2"></feGaussianBlur>
          <feComposite
            k3="1"
            k2="-1"
            operator="arithmetic"
            in2="hardAlpha"
          ></feComposite>
          <feColorMatrix
            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.52 0"
            type="matrix"
          ></feColorMatrix>
          <feBlend
            result="effect2_innerShadow_1_38"
            in2="shape"
            mode="normal"
          ></feBlend>
        </filter>
        <radialGradient
          gradientTransform="translate(80 17.4236) rotate(90) scale(6.25004 36.9143)"
          gradientUnits="userSpaceOnUse"
          r="1"
          cy="0"
          cx="0"
          id="paint0_radial_1_38"
        >
        <stop stop-color="#27a776"></stop>
<stop stop-color="#27a776" offset="0.901042"></stop>

        </radialGradient>
      </defs>
    </svg>
  </div>
</div>

<style>
/* checbox */
.check {
 position: relative;
 width: 16px;
 height: 16px;
 border-radius: 2px;
 appearance: none;
 background-color: rgba(39, 167, 118, 0.486);
 border: 1px solid #fff;
 transition: all .3s;
 vertical-align: middle;
 margin-right: 6px;
}

.check::before {
 content: '';
 position: absolute;
 border: solid #fff;
 display: block;
 width: .3em;
 height: .6em;
 border-width: 0 .2em .2em 0;
 z-index: 1;
 opacity: 0;
 right: calc(50% - .2em);
 top: calc(50% - .4em);
 transform: rotate(0deg);
 transition: all .3s;
 transform-origin: center center;
}

.check:checked {
 animation: a .3s ease-in forwards;
 background-color: #27a776;
}

.check:checked::before {
 opacity: 1;
 transform: rotate(405deg);
}

@keyframes a {
 0% {
  opacity: 1;
  transform: scale(1) rotateY(0deg);
 }

 50% {
  opacity: 0;
  transform: scale(.8) rotateY(180deg);
 }

 100% {
  opacity: 1;
  transform: scale(1) rotateY(360deg);
 }
}

.inline-flex {
 display: flex;
 align-items: center;
}

.ml-2 {
 margin-left: 0.5rem;
}
</style>
</body>
</html>