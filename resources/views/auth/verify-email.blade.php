
<head>
<link href="{{asset('assets/img/favicon.png')}}" rel="icon">
<link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Verify Email-Mitram</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

</head>

<div class="card">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button> 
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>


<style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  background-color: black;
}

.card {
  box-sizing: border-box;
  width: 600px;
  height: 254px;
  background: #1a1a1a1a;
  border: 1px solid white;
  box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
  backdrop-filter: blur(6px);
  border-radius: 17px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 20px;
  user-select: none;
  font-weight: bolder;
  color: white;
}

.card:hover {
  border: 5px solid #156345;
  transform: scale(1.05);
}

.card:active {
  transform: scale(0.95) rotateZ(1.7deg);
}

.card-text {
  margin-top: 20px;
}

.button-container {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

button {
  padding: 10px 20px;
  background-color: #27a776;
  color: white;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #1f8b61;
}

</style>
