<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Mitram</title>
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="contact-page">
    <main class="main">
        <div class="reg-container">
            <!-- Session Messages -->
            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif
            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf
                <p class="title">Register</p>
                <p class="message">Signup now and get full access to our website.</p>
                <!-- Name -->
                <label>
                    <input class="input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    <span>Name</span>
                    <x-input-error :messages="$errors->get('name')" class="error-message" />
                </label>
                <!-- Username -->
                <label>
                    <input class="input" type="text" name="username" value="{{ old('username') }}" required autocomplete="username">
                    <span>Username</span>
                    <x-input-error :messages="$errors->get('username')" class="error-message" />
                </label>
                <!-- Email -->
                <label>
                    <input class="input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <span>Email</span>
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </label>
                <!-- Password -->
                <label>
                    <input class="input" type="password" name="password" required autocomplete="new-password">
                    <span>Password</span>
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </label>
                <!-- Confirm Password -->
                <label>
                    <input class="input" type="password" name="password_confirmation" required autocomplete="new-password">
                    <span>Confirm Password</span>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
                </label>
                <button class="submit" type="submit">Register</button>
                <p class="signin">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            </form>
        </div>
  @include('includes.style')

  </main>
</body>

</html>


