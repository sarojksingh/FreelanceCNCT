<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">

            <!-- Sidebar -->
            <div class="w-64 bg-[#7F55E0] text-white flex flex-col min-h-screen">
                <div class="py-6 px-4">
                    <h1 class="text-2xl font-bold">Freelancer</h1>
                </div>
                <nav class="flex-grow">
                    <ul class="space-y-2 px-4">
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center p-2 rounded {{ request()->routeIs('dashboard') ? 'bg-[#6A45C4]' : 'hover:bg-[#6A45C4]' }}">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('projects') }}"
                                class="flex items-center p-2 rounded {{ request()->routeIs('projects') ? 'bg-[#6A45C4]' : 'hover:bg-[#6A45C4]' }}">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span class="ml-2">Projects</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('clients.index') }}" class="flex items-center p-2 rounded hover:bg-[#6A45C4]">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M3 6h18M3 14h18m-9 4h9"></path>
                                </svg>
                                <span class="ml-2">Client</span>
                            </a>
                        </li>
                        <li>
                            <a href="/freelancer/chat/2" class="flex items-center p-2 rounded hover:bg-[#6A45C4]">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                                <span class="ml-2">Message</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 rounded hover:bg-[#6A45C4]">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M3 6h18M3 14h18m-9 4h9"></path>
                                </svg>
                                <span class="ml-2">Setting</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 rounded hover:bg-[#6A45C4]">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v12l3-3 4 4 5-5 3 3V3"></path>
                                </svg>
                                <span class="ml-2">Profile</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="p-4">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>
