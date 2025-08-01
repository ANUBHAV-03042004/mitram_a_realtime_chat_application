  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<style>
    .custom-nav-link-name {
        color: white !important;
    }
    .custom-nav-link {
        color: white !important;
    }
    .custom-nav-link:hover {
        color: black !important;
    }
    .notification-count {
        font-size: 18px;
        color: white;
        vertical-align: super;
        margin-left: 2.2vw !important;
        position: relative;
        top: -39.5px;
    }
    .notification-bell {
        margin-top: 1vh;
        position: relative;
        display: inline-block;
        padding: 0;
    }
    .notification-bell img {
        width: 50px;
        height: 50px;
        vertical-align: middle;
    }
    .notification-section {
        display: inline-block;
        padding: 0;
        margin: 0;
    }
    nav {
        z-index: 1000;
        position: relative;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #212121;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1001;
        right: 0;
        top: 100%;
    }
    .dropdown-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .dropdown-content a:hover{
        background-color:white;
        color:black;
    }
</style>

<nav x-data="{ open: false }" class="custom-bg border-b border-gray-100" style="background-color: black !important;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets\img\logo_mitram.png') }}" class="block h-9 w-auto fill-current text-gray-800" alt="logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex tt">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="custom-nav-link-name">
                        {{ __('Users') }}
                    </x-nav-link>
                    <x-nav-link :href="route('chatify')" :active="request()->routeIs('chatify')" class="custom-nav-link-name">
                        {{ __('Chat') }}
                    </x-nav-link>
                    <x-nav-link :href="route('chat')" :active="request()->routeIs('chat')" class="custom-nav-link-name">
                        {{ __('Mitr.Ai') }}
                    </x-nav-link>
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="custom-nav-link-name">
                        {{ __('Group Chat') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/group/create')" :active="request()->is('/group/create')" class="custom-nav-link-name">
                        {{ __('Create Group') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/subscribe')" :active="request()->routeIs('/subscribe')" class="custom-nav-link-name">
                        {{ __('Join Group') }}
                    </x-nav-link>
                    @if($users)
                    <div class="notification-section">
                        <a href="" class="notification-bell">
                            <img src="{{ asset('assets/img/bell.png') }}" alt="bell">
                            <sup class="notification-count">{{ $users }}</sup>
                        </a>
                    </div>
                    @else
                    <div class="notification-section">
                        <a href="" class="notification-bell">
                            <img src="{{ asset('assets/img/bell-off.png') }}" alt="bell-off">
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="relative">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 custom-bg hover:text-gray-700 focus:outline-none transition ease-in-out duration-150" style="background-color: black !important;" @click="open = !open; console.log('Dropdown clicked'); document.getElementById('dropdownMenu').style.display = open ? 'block' : 'none';">
                        <div class="custom-nav-link-name">{{ Auth::user()->name }}</div>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" style="color:white;" />
                            </svg>
                        </div>
                    </button>
                    <div id="dropdownMenu" class="dropdown-content">
                        <a href="{{ route('profile.edit') }}" class="custom-nav-link">Profile</a>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="custom-nav-link">Log Out</a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="custom-nav-link-name">
                {{ __('Users') }}
            </x-nav-link>
            <x-responsive-nav-link :href="route('chatify')" :active="request()->routeIs('chatify')" class="custom-nav-link-name">
                {{ __('Chat') }}
            </x-nav-link>
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="custom-nav-link-name">
                {{ __('Group Chat') }}
            </x-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="custom-nav-link">
                    {{ __('Profile') }}
                </x-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();" class="custom-nav-link">
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>