<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MitRam-Connect your Mitr to chat</title>
  <link rel="icon" href="{{asset('assets/img/logo.png')}}"/>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
    </head>
    <body>
@include('includes/header')
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div style="width: 200px; height: 200px; overflow: hidden; border-radius: 50%;">
    <img src="{{asset('assets\img\logo_mitram.png')}}" alt="Circular Image" style="width: 100%; height: auto;">
</div>

            <div class="col-lg-8">
              <h1>Welcome to MitRam</h1>
              <p class="mb-0">A real-time chat platform—a space where ideas flow, teams sync up, and productivity soars.
                <br> Say goodbye to delays and hello to seamless communication.</p>
              <a href="register" class="cta-btn">Let’s dive in!<br></a>
          
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Methodology and Methods</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
      <div class="row">
                <div class="col-md-6 mb-4">
                    <h4><i class="fas fa-desktop me-2"></i> User Interface Development</h4>
                    <ul>
                        <li>Design UI components for chat functionalities.</li>
                        <li>Ensure responsive design for web and mobile platforms.</li>
                    </ul>
                </div>
                <div class="col-md-6 mb-4">
                    <h4><i class="fas fa-database me-2"></i> Message Storage and Retrieval</h4>
                    <ul>
                        <li>Store messages in the database.</li>
                        <li>Implement efficient retrieval and pagination of chat history.</li>
                    </ul>
                </div>
                <div class="col-md-6 mb-4">
                    <h4><i class="fas fa-bell me-2"></i> Notifications and User Presence</h4>
                    <ul>
                        <li>Track user status and implement push notifications.</li>
                    </ul>
                </div>
                <div class="col-md-6 mb-4">
                    <h4><i class="fas fa-lock me-2"></i> Security Measures</h4>
                    <ul>
                        <li>Prevent XSS attacks, validate inputs, and secure WebSocket connections.</li>
                    </ul>
                </div>
                <div class="col-md-6 mb-4">
                    <h4><i class="fas fa-vial me-2"></i> Testing and Deployment</h4>
                    <ul>
                        <li>Conduct unit testing.</li>
                        <li>Deploy the application and test across different devices and browsers.</li>
                    </ul>
                </div>
            </div>
      </div><!-- End Section Title -->

      <!-- <div class="container" data-aos="fade-up">
        <p>Use this page as a starter for your own custom pages.</p>
      </div> -->

    </section><!-- /Starter Section Section -->

  </main>
  @include('includes/footer')

</body>
</div>
</html>
