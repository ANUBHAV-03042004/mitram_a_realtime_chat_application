
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Forgot Password-Mitram</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
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
  <link href="{{('assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: PhotoFolio
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body class="contact-page">
  <main class="main">
  <div id="Container">
   

<div class="subscribe">
    <p>Forgot your password? No problem. Just let us know your email
        address and we will email you a password reset link that will allow
        you to choose a new one.</p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="form" method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
        <input id="email"  placeholder="Your e-mail" class="subscribe-input" name="email":value="old('email')" required autofocus  type="email">
            <x-input-error :messages="$errors->get('email')"  class="error-message" />
        </div>
        <br>
    <button type="submit" class="submit-btn">Email Password Reset Link</button>
  </div>
</div>
  </form> 
<style>
          /* error */
.error-message {
    color: red;
    font-size: 12px;
    margin-top: 5px;
    display: block;
}

.subscribe {
  position: absolute;
  height: 360px;
  width: 500px;
  padding: 20px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color:  #1a1a1a;
  justify-items:center;
  border-radius: 4px;
  color: #22a276;
  box-shadow: 0px 0px 60px 5px rgba(255, 255, 255, 0.1);
}

.subscribe:after {
  position: absolute;
  content: "";
  right: -9px;
  bottom: 21px;
  width: 0;
  height: 0;
  border-left: 0px solid transparent;
  border-right: 10px solid transparent;
  /* border-bottom: 10px solid  #156345; */
  border-bottom: 10px solid  #27a776;
}


.subscribe p {
  text-align: center;
  font-size: 20px;
  font-weight: bold;
  letter-spacing: 4px;
  line-height: 28px;
}

.subscribe input {
  position: absolute;
  bottom: 60px;
  border: none;
  border-bottom: 1px solid  #22a276;
  padding: 10px;
  width: 82%;
  background: transparent;
  transition: all .25s ease;
  font-size: 20px;
 transform:translateX(-55%);
  color: #fff;
}
.subscribe input::placeholder {
  color: rgba(34, 162, 118, 0.7); /* Slightly transparent version of #22a276 */
}

.subscribe input:focus {
  outline: none;
  border-bottom: 1px solid  #1a1a1a;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', 'sans-serif';
}

.subscribe .submit-btn {
  position: absolute;
  border-radius: 30px;
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  border:none;
  background-color:  #22a276;
  /* background-color:  #156345; */
  color: #FFF;
  padding: 12px 30px;
  display: inline-block;
  font-size: 13px;
  font-weight: bold;
  letter-spacing: 5px;
  right: -10px;
  bottom: -20px;
  cursor: pointer;
  transition: all .25s ease;
  box-shadow: -5px 6px 20px 0px rgba(26, 26, 26, 0.4);
}

/* .subscribe .submit-btn:hover {
  background-color: #156345;
  box-shadow: -5px 6px 20px 0px rgba(88, 88, 88, 0.569);
}*/
  </style> 
  </main>
</body>
</html>