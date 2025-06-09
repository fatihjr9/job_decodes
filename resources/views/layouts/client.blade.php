<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Loker Decodes Fatih') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="bg-slate-50 font-sans antialiased">
        <div class="bg-white drop-shadow-sm">
            <div class="border-b">
                <div class="flex flex-row items-center justify-between max-w-7xl mx-auto p-4">
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="text-gray-800 text-lg font-semibold">
                            Jobseeker
                        </a>
                    </div>
        
                    <div class="flex items-center">
                        @if (Route::has('login'))
                            @auth
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('admin-dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                        Dashboard
                                    </a>
                                @elseif (Auth::user()->role == 'user')
                                    <a href="{{ route('user-dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                        Dashboard
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="font-sans text-gray-900 antialiased max-w-7xl mx-auto p-4 mt-2">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
