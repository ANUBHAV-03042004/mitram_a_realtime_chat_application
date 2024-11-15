
<section>
    <header>
        <h2>
            {{ __('Profile Information') }}
        </h2>
        <p>
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
 
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="input-container">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="input-field" value="{{ old('name', $user->name) }}" required  autocomplete="name">
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="input-container">
            <label for="username">User-name</label>
            <input type="text" id="username" name="username" class="input-field" value="{{ old('username', $user->username) }}" required autocomplete="username">
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div class="input-container">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="input-field" value="{{ old('email', $user->email) }}" required autocomplete="email">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="btn-t">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <button type="submit" class="btn-t">Save</button>
            @if (session('status') === 'profile-updated')
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
    .input-container {
        display: flex;
        flex-direction: column;
        margin-bottom: 1rem;
    }

    .input-container label {
        margin-bottom: 0.5rem;
    }

    .input-field {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
    }

    .btn-t {
        font-size: 17px;
        background: transparent;
        border: none;
        padding: 1em 1.5em;
        color: #156345;
        text-transform: uppercase;
        position: relative;
        transition: 0.5s ease;
        cursor: pointer;
    }

    .btn-t::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 2px;
        width: 0;
        background-color: #156345;
        transition: 0.5s ease;
    }

    .btn-t:hover {
        color: #1e1e2b;
        transition-delay: 0.5s;
    }

    .btn-t:hover::before {
        width: 100%;
    }

    .btn-t::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 0;
        width: 100%;
        background-color: #156345;
        transition: 0.4s ease;
        z-index: -1;
    }

    .btn-t:hover::after {
        height: 100%;
        transition-delay: 0.4s;
        color: aliceblue;
    }
</style>

