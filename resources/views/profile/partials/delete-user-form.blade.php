<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="space-y-6" x-data="{
    open: false,
    password: '',
    errorMessage: '',
    async submitForm(event) {
        event.preventDefault();
        this.errorMessage = '';
        const form = event.target;
        const formData = new FormData(form);
        
        try {
            const response = await fetch('{{ route('profile.destroy') }}', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: formData
            });
            
            if (response.ok) {
                window.location.href = '/'; // Redirect after successful deletion
            } else {
                const data = await response.json();
                this.errorMessage = data.errors?.password?.[0] || 'An error occurred';
            }
        } catch (error) {
            console.error('An error occurred:', error);
            this.errorMessage = 'An unexpected error occurred';
        }
    }
}">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button class="btn" @click="open = true">{{ __('Delete Account') }}</button>

    <div x-show="open" class="modal-overlay" @click.away="open = false">
        <div class="modal-content p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" @click.stop>
            <form @submit="submitForm" class="p-6">
                @csrf
                @method('delete')

                <h2 class="modal-title">
                    {{ __('to delete your account?') }}
                </h2>

                <p class="modal-description">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>


                
                <div class="username-input-wrapper mt-4">
    <x-input-label for="username" value="{{ __('Username') }}" class="sr-only" />
    <div class="username-input-container">
        <x-text-input
            id="username"
            name="username"
            type="text"
            class="mt-1 block w-full username-input"
            placeholder="{{ __('Username') }}"
            autocomplete="username"
            aria-hidden="true"
            style="display: none;"
        />
    </div>
</div>

                <div class="password-input-wrapper mt-4">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                    <div class="password-input-container">
                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="mt-1 block w-full password-input"
                            placeholder="{{ __('Password') }}"
                            autocomplete="current-password"
                        />
                    </div>
                    <p x-show="errorMessage" x-text="errorMessage" class="text-sm text-red-600 mt-2"></p>
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" class="btn-c" @click="open = false">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="btn">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<style>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-title {
    font-size: 24px;
    margin-bottom: 10px;
}

.modal-description {
    font-size: 14px;
    margin-bottom: 20px;
}
</style>