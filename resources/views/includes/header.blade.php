
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a  class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="">
        <!-- <i class="bi bi-chat"></i> -->
        <h1>MitRam</h1>
      </a>

      <nav id="navmenu" class="navmenu">
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="key_features">Key Features</a></li>
@if (Route::has('login'))
                
                    @auth
                    <li><a href="{{ route('chatify') }}">Chat</a></li>
                    <li><a href="{{ route('home') }}">Group Chat</a></li>
                    @else
                  <li><a href="login" >Log in</a></li>
                  @if (Route::has('register'))
    <li><a href="register">Register</a></li>
    @endif
                    @endauth
            @endif
    <li><a href="contact.html">Contact Us</a></li>
  </ul>
  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>


    <div class="header-social-links">
    <!-- <button class="button">
  <div class="button-content">
    <img src="assets\img\thumb_15951118880user.png" id="profile-pic" />
    Profile
  </div> -->
           <!--<a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> -->
      </div>

    </div>
  </header>
<!-- End Header -->
    