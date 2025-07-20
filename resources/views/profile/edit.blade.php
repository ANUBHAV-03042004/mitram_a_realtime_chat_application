@include('layouts\navigation')
 <!-- Scripts -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])
<title>Profile-Mitram</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<body>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.profile-pic-form')
                </div>
            </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</body>
<style>
body {
    background-color: black;
}

.py-12 {
    padding-top: 3rem;
    padding-bottom: 3rem;
}

.max-w-7xl {
    max-width: 80rem;
    margin-left: auto;
    margin-right: auto;
}

.space-y-6 > * + * {
    margin-top: 1.5rem;
}

.bg-white, .dark\:bg-gray-800 {
    background-color: #121212; /* Dark background for the form */
}
/* Change the background of the form container to black */
.p-4.sm\:p-8.bg-white.dark\:bg-gray-800 {
    background-color: black !important;
}

/* Ensure text is visible on black background */
.p-4.sm\:p-8.bg-white.dark\:bg-gray-800 * {
    color: #e0e0e0;
}

/* Adjust input fields for better visibility */
.p-4.sm\:p-8.bg-white.dark\:bg-gray-800 input {
    background-color: #121212;
    border: 1px solid #27a776;
    color: #e0e0e0;
}
.shadow {
    box-shadow: 0 0 20px rgba(39, 167, 118, 0.2), 0 0 40px rgba(21, 99, 69, 0.2);
}


.max-w-7xl {
    max-width: 80rem;
    margin-left: auto;
    margin-right: auto;
}

.space-y-6 > * + * {
    margin-top: 1.5rem;
}

.bg-white {
    background-color: #212121;
}

.shadow {
    box-shadow: 0 0 20px rgba(39, 167, 118, 0.5), 0 0 40px rgba(21, 99, 69, 0.5);
}

.sm\:rounded-lg {
    border-radius: 0.5rem;
}

.p-4 {
    padding: 1rem;
}

@media (min-width: 640px) {
    .sm\:p-8 {
        padding: 2rem;
    }
}

.max-w-xl {
    max-width: 36rem;
}

/* Add a gradient border to each section */
.p-4.sm\:p-8 {
  background-color: #212121;
  border: 2px solid black;
  position: relative;
  overflow: hidden;
  z-index: 1;
}

.p-4.sm\:p-8::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(145deg, transparent 35%, #27a776, #156345);
  z-index: -1;
  animation: gradientMove 5s ease infinite;
}

@keyframes gradientMove {
  0% {
    transform: translateX(-50%) translateY(-50%);
  }
  50% {
    transform: translateX(50%) translateY(50%);
  }
  100% {
    transform: translateX(-50%) translateY(-50%);
  }
}
    
</style>