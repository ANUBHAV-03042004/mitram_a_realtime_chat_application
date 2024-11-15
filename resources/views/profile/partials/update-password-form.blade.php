<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>
        
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="password-input-wrapper">
            <x-input-label for="current_password" :value="__('Current Password')" />
            <div class="password-input-container">
                <x-text-input id="password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
               
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="password-input-wrapper">
            <x-input-label for="password" :value="__('New Password')" />
            <div class="password-input-container">
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="password-input-wrapper">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="password-input-container">
                <x-text-input id="password" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
          
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <button class="btn-t">{{ __('Save') }}</button>
            
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<style>
.password-input-wrapper {
    position: relative;
    width: 100%;
}

.password-input-container {
    position: relative;
    display: flex;
    align-items: center;
}

.password-input-container input[type="password"],
.password-input-container input[type="text"] {
    flex-grow: 1;
    padding-right: 40px;
    background-color: #121212;
    border: 1px solid #27a776;
    color: #e0e0e0;
    height: 40px;
}
    .btn {
 --color: #FF0000;
 --color2: rgb(10, 25, 30);
 padding: 10px 20px;
 background-color: transparent;
 border-radius: 8px;
 border: .3px solid var(--color);
 transition: .5s;
 position: relative;
 overflow: hidden;
 cursor: pointer;
 z-index: 1;
 font-size: 17px;
font-weight: bold;
transition: all 0.3s ease;
 font-family: 'Roboto', 'Segoe UI', sans-serif;
 text-transform: uppercase;
 color: var(--color);
}

.btn::after, .btn::before {
 content: '';
 display: block;
 height: 100%;
 width: 100%;
 transform: skew(90deg) translate(-50%, -50%);
 position: absolute;
 inset: 50%;
 left: 25%;
 z-index: -1;
 transition: .5s ease-out;
 background-color: var(--color);
}

.btn::before {
 top: -50%;
 left: -25%;
 transform: skew(90deg) rotate(180deg) translate(-50%, -50%);
}

.btn:hover::before {
 transform: skew(45deg) rotate(180deg) translate(-50%, -50%);
}

.btn:hover::after {
 transform: skew(45deg) translate(-50%, -50%);
}

.btn:hover {
 color: var(--color2);
}

.btn:active {
 filter: brightness(.7);
 transform: scale(.98);
}

.btn-c {
 --color: #00A97F;
 --color2: rgb(10, 25, 30);
 padding: 10px 20px;
 background-color: transparent;
 border-radius: 8px;
 border: .3px solid var(--color);
 transition: .5s;
 position: relative;
 overflow: hidden;
 cursor: pointer;
 z-index: 1;
 font-weight: 300;
 font-size: 17px;
transition: all 0.3s ease;
 font-family: 'Roboto', 'Segoe UI', sans-serif;
 text-transform: uppercase;
 color: var(--color);
}

.btn-c::after, .btn-c::before {
 content: '';
 display: block;
 height: 100%;
 width: 100%;
 transform: skew(90deg) translate(-50%, -50%);
 position: absolute;
 inset: 50%;
 left: 25%;
 z-index: -1;
 transition: .5s ease-out;
 background-color: var(--color);
}

.btn-c::before {
 top: -50%;
 left: -25%;
 transform: skew(90deg) rotate(180deg) translate(-50%, -50%);
}

.btn-c:hover::before {
 transform: skew(45deg) rotate(180deg) translate(-50%, -50%);
}

.btn-c:hover::after {
 transform: skew(45deg) translate(-50%, -50%);
}

.btn-c:hover {
 color: var(--color2);
}

.btn-c:active {
 filter: brightness(.7);
 transform: scale(.98);
}


/* Style for the password input container */
.mb-3 {
  position: relative;
}
.password-input {
    background-color: rgba(255, 255, 255, 0.1);
    border: none;
    border-radius: 8px;
    color: #ffffff;
    padding: 12px;
    margin-top: 20px;
    margin-bottom: 20px;
}
/* Style for the password input */
#password {
  padding-right: 40px; /* Make room for the icon */
}

/* Style for the eye icon */
.password-toggle-icon {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  color: white; /* Set the icon color to white */
  /* If using a background image for the icon */
  filter: brightness(0) invert(1);
}

/* Ensure visibility against light backgrounds */
.password-toggle-icon {
  text-shadow: 0 0 2px rgba(0,0,0,0.5);
}

/* Style for the modal to ensure proper contrast */
.modal-content {
  background-color: #333; /* Dark background for the modal */
  color: white; /* Light text color */
    border-radius: 20px;
    border: none;
    box-shadow: 0 0 20px rgba(0, 255, 170, 0.2);
    padding: 20px;
    width: 90%;
    max-width: 500px;
}


/* Style for form labels */
.form-label {
  color: white;
}
/* Style for the password input */
#password, .form-control {
    background-color: rgba(0, 30, 30, 0.6); /* Dark green with transparency */
    border: 1px solid rgba(0, 255, 170, 0.3); /* Subtle green border */
    border-radius: 8px; /* Curved edges */
    color: #ffffff; /* White text */
    padding: 12px;
    box-shadow: 0 0 10px rgba(0, 255, 170, 0.1); /* Subtle glow effect */
    transition: all 0.3s ease;
}

#password:focus, .form-control:focus {
    background-color: rgba(0, 40, 40, 0.8); /* Slightly lighter when focused */
    border-color: rgba(0, 255, 170, 0.5); /* More visible border on focus */
    box-shadow: 0 0 15px rgba(0, 255, 170, 0.2); /* Enhanced glow on focus */
    outline: none;
}

/* Style for the password input placeholder */
#password::placeholder, .form-control::placeholder {
    color: rgba(255, 255, 255, 0.5); /* Slightly transparent white */
}
</style>
