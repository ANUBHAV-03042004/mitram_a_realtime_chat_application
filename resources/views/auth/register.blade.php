<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Register-Mitram </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
 

<!-- Include jQuery and Bootstrap JS for simplicity -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <!-- Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

<body class="contact-page">
  <main class="main">
  </div>
  <div class="reg-container">
    <form  class="form"  method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <p class="title">Register </p>
    <p class="message">Signup now and get full access to our website. </p>
        <!-- <div class="flex"> -->
        <label>
            <input class="input" type="text" placeholder=""  name="name"  value="{{old('name')}}" required autofocus autocomplete="name">
            <span>Name</span>
            <x-input-error :messages="$errors->get('name')" class="error-message"  />
        </label>
        <!-- </div> -->
        <label>
        <input class="input" type="text"  placeholder=""name="username" value="{{old('username')}}" required autofocus autocomplete="username">
        <span>User name</span>
        <x-input-error :messages="$errors->get('username')"class="error-message"  /> 
    </label> 
   
        <!-- Email Address -->
        <label>
        <input class="input"  type="email" placeholder="" name="email" value="{{old('email')}}" required autofocus autocomplete="email">
        <span>Email</span>
        <x-input-error :messages="$errors->get('email')" class="error-message"  />
    </label> 
          

        <!-- Password -->
<label>
    <input class="input" type="password" placeholder="" name="password" required autocomplete="new-password">
    <span>Password</span>
    <x-input-error :messages="$errors->get('password')" class="error-message" />
</label>

<!-- Confirm Password -->
<label>
    <input class="input" type="password" placeholder="" name="password_confirmation" required autocomplete="new-password">
    <span>Confirm Password</span>
    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
</label> 
    <button class="submit" type="submit">Register</button>
    <p class="signin">Already have an account ? <a href="login">Sign in</a> </p>
    </form>
  </div>
  @include('includes/style')

  </main>
</body>

</html>


