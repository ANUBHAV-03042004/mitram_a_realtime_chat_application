
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Reset Password-Mitram</title>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

    <form class="container" id="resetForm" method="POST" action="{{ route('password.store') }}">
        @csrf
        <script>
    @if(session('status'))
        alert("{{ session('status') }}");
    @endif
    </script>
<div class="input-container">
    <div class="input-content">
      <div class="input-dist">
        <div class="input-type">
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <!-- Email Address -->
            <x-text-input placeholder="Email" id="email" class="input-is" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="error-message" />
        <!-- Password -->
        <div class="password-container">
            <input  id="password" class="input-is password" type="password" required placeholder="Password" name="password"  autocomplete="new-password"/>
            <i class="eye-icon fas fa-eye" onclick="togglePassword(this)"></i>
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>
        <!-- Confirm Password -->
          <div class="password-container">
            <input  id="password_confirmation" class="input-is password" type="password" required placeholder="Confirm Password" name="password_confirmation" autocomplete="new-password"/>
            <i class="eye-icon fas fa-eye" onclick="togglePassword(this)"></i>                           
            <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
        </div>
        </div>
      </div>
    </div>
  </div>
  <button class="submit-button">Submit</button>
  </form>
<style>
          /* error */
.error-message {
    color: red;
    font-size: 12px;
    margin-top: 5px;
    display: block;
}

.alert {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
}

.alert-danger {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
}

.alert-success {
  color: #3c763d;
  background-color: #dff0d8;
  border-color: #d6e9c6;
}
  
body {
  margin: 0;
  padding: 0;
  background-color: #000;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.container {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  font-style: italic;
  font-weight: bold;
  display: flex;
  margin: auto;
  aspect-ratio: 16/9;
  align-items: center;
  justify-items: center;
  justify-content: center;
  flex-wrap: nowrap;
  flex-direction: column;
  gap: 1em;
  background-color: #000;
  color: #fff;
  width: 80vw; /* Increased width */
  max-width: 600px; /* Added max-width for larger screens */
  padding: 2em; /* Added padding */
}

.input-container {
  filter: drop-shadow(46px 36px 24px #22a276)
    drop-shadow(-55px -40px 25px #156345);
  animation: blinkShadowsFilter 8s ease-in infinite;
  width: 100%; /* Make it full width of the container */
}

.eye-icon {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #22a276;
}

.input-content {
  display: grid;
  align-content: center;
  justify-items: center;
  align-items: center;
  text-align: center;
  padding-inline: 1em;
}

.input-content::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  filter: blur(40px);
  -webkit-clip-path: polygon(
    26% 0,
    66% 0,
    92% 0,
    100% 8%,
    100% 89%,
    91% 100%,
    7% 100%,
    0 92%,
    0 0
  );
  clip-path: polygon(
    26% 0,
    66% 0,
    92% 0,
    100% 8%,
    100% 89%,
    91% 100%,
    7% 100%,
    0 92%,
    0 0
  );
  background: rgba(34, 162, 118, 0.5);
  transition: all 1s ease-in-out;
}

.input-content::after {
  content: "";
  position: absolute;
  width: 98%;
  height: 98%;
  box-shadow: inset 0px 0px 20px 20px #000;
  background: repeating-linear-gradient(
      to bottom,
      transparent 0%,
      rgba(34, 162, 118, 0.6) 1px,
      #000 3px,
      #156345 5px,
      #22a276 4px,
      transparent 0.5%
    ),
    repeating-linear-gradient(
      to left,
      #156345 100%,
      rgba(21, 99, 69, 0.99) 100%
    );
  -webkit-clip-path: polygon(
    26% 0,
    31% 5%,
    61% 5%,
    66% 0,
    92% 0,
    100% 8%,
    100% 89%,
    91% 100%,
    7% 100%,
    0 92%,
    0 0
  );
  clip-path: polygon(
    26% 0,
    31% 5%,
    61% 5%,
    66% 0,
    92% 0,
    100% 8%,
    100% 89%,
    91% 100%,
    7% 100%,
    0 92%,
    0 0
  );
  animation: backglitch 50ms linear infinite;
}

.input-dist {
  z-index: 80;
  display: grid;
  align-items: center;
  text-align: center;
  width: 100%;
  padding-inline: 1em;
  padding-block:   2em;
  grid-template-columns: 1fr;
}
.input-type {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  gap: 1.5em;
  font-size: 1.1rem;
  background-color: transparent;
  width: 100%;
  border: none;
}

.input-content::before,
.input-content::after {
  width: 100%;
  height: 100%;
}


.input-is {
  color: #fff;
  font-size: 1rem;
  background-color: transparent;
  width: 100%;
  box-sizing: border-box;
  padding-inline: 0.5em;
  padding-block: 0.8em;
  border: none;
  transition: all 1s ease-in-out;
  border-bottom: 1px solid #22a276;
}

.input-is:hover {
  transition: all 1s ease-in-out;
  background: linear-gradient(
    90deg,
    transparent 0%,
    rgba(34, 162, 118, 0.2) 27%,
    rgba(34, 162, 118, 0.2) 63%,
    transparent 100%
  );
}

.input-content:focus-within::before {
  transition: all 1s ease-in-out;
  background: rgba(255, 255, 255, 0.814);
}

.input-is:focus {
  outline: none;
  border-bottom: 1px solid #fff;
  color: #fff;
  background: linear-gradient(
    90deg,
    transparent 0%,
    rgba(34, 162, 118, 0.2) 27%,
    rgba(34, 162, 118, 0.2) 63%,
    transparent 100%
  );
}

.input-is::placeholder {
  color: rgba(255, 255, 255, 0.806);
}

.submit-button {
  width: 60%;
  border: none;
  color: rgba(255, 255, 255, 0.806);
  background: linear-gradient(
    90deg,
    transparent 0%,
    rgba(34, 162, 118, 0.2) 27%,
    rgba(34, 162, 118, 0.2) 63%,
    transparent 100%
  );
  clip-path: polygon(0 0, 85% 0%, 100% 0, 100% 15%, 100% 90%, 91% 100%, 0 100%);
  padding: 0.7em;
  animation: blinkShadowsFilter 0.5s ease-in infinite;
  transition: all 500ms;
  font-size:1.1rem;
}

.submit-button:hover {
  color: #fff;
  cursor: pointer;
  font-size: medium;
  font-weight: bold;
}

.password-container {
  position: relative;
  width: 100%;
}

.eye-icon {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
}

@keyframes backglitch {
  0% {
    box-shadow: inset 0px 20px 20px 30px #000;
  }

  50% {
    box-shadow: inset 0px -20px 20px 30px #156345;
  }

  to {
    box-shadow: inset 0px 20px 20px 30px #000;
  }
}

@keyframes blinkShadowsFilter {
  0% {
    filter: drop-shadow(46px 36px 28px rgba(34, 162, 118, 0.34))
      drop-shadow(-55px -40px 28px #156345);
  }

  25% {
    filter: drop-shadow(46px -36px 24px rgba(34, 162, 118, 0.9))
      drop-shadow(-55px 40px 24px #156345);
  }

  50% {
    filter: drop-shadow(46px 36px 30px rgba(34, 162, 118, 0.9))
      drop-shadow(-55px 40px 30px rgba(21, 99, 69, 0.29));
  }

  75% {
    filter: drop-shadow(20px -18px 25px rgba(34, 162, 118, 0.9))
      drop-shadow(-20px 20px 25px rgba(21, 99, 69, 0.29));
  }

  to {
    filter: drop-shadow(46px 36px 28px rgba(34, 162, 118, 0.34))
      drop-shadow(-55px -40px 28px #156345);
  }
}
</style>

<script>
function togglePassword(icon) {
  const passwordInput = icon.previousElementSibling;
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    passwordInput.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}
document.getElementById('resetForm').addEventListener('submit', function(e) {
    e.preventDefault();
    fetch(this.action, {
        method: 'POST',
        body: new FormData(this),
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            window.location.href = '/login';
        } else if (data.error) {
            alert(data.error);
        } else {
            alert('An unexpected response was received.');
        }
    })
    .catch(() => {
        alert('An error occurred. Please try again.');
    });
});
</script>


</body>
</html>