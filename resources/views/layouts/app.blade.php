<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!--
            - favicon
          -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.svg') }}" type="image/svg+xml">

        <!--
          - custom css link
        -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!--
          - google font link
        -->
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        @filamentStyles

        @stack('styles')
    </head>
    <body class="antialiased">
        <header class="header" data-header>

            <div class="overlay" data-overlay></div>

            <div class="header-top">
                <div class="container">

                    <a href="tel:+01123456790" class="helpline-box">

                        <div class="icon-box">
                            <ion-icon name="call-outline"></ion-icon>
                        </div>

                        <div class="wrapper">
                            <p class="helpline-title">لمزيد من الاستفسار :</p>

                            <p class="helpline-number">+091 1234567</p>
                        </div>

                    </a>

                    <a href="#" class="logo">
                        <img src="{{ asset('img/logo.svg') }}" alt="Tourly logo">
                    </a>

                    <div class="header-btn-group">

                        <button class="search-btn" aria-label="Search">
                            <ion-icon name="search"></ion-icon>
                        </button>

                        <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
                            <ion-icon name="menu-outline"></ion-icon>
                        </button>

                    </div>

                </div>
            </div>

            <div class="header-bottom">
                <div class="container">

                    <ul class="social-list">

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="social-link">
                                <ion-icon name="logo-youtube"></ion-icon>
                            </a>
                        </li>

                    </ul>

                    <nav class="navbar" data-navbar>

                        <div class="navbar-top">

                            <a href="#" class="logo">
                                <img src="{{ asset('img/logo-blue.svg') }}" alt="Tourly logo">
                            </a>

                            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
                                <ion-icon name="close-outline"></ion-icon>
                            </button>

                        </div>

                        <ul class="navbar-list">

                            <li>
                                <a href="{{ route('main') }}" class="navbar-link" data-nav-link>الرئيسية</a>
                            </li>

                            <li>
                                <a href="{{ route('main') }}" class="navbar-link" data-nav-link>من نحن</a>
                            </li>

                            <li>
                                <a href="{{ route('main') }}" class="navbar-link" data-nav-link>الواجهات</a>
                            </li>

                            <li>
                                <a href="{{ route('main') }}" class="navbar-link" data-nav-link>خطوط الطيران</a>
                            </li>

                            <li>
                                <a href="{{ route('main') }}" class="navbar-link" data-nav-link>المعرض</a>
                            </li>

                            <li>
                                <a href="{{ route('main') }}" class="navbar-link" data-nav-link>تواصل معنا</a>
                            </li>

                        </ul>

                    </nav>

                    <button class="btn btn-primary">احجز الآن</button>

                </div>
            </div>

        </header>
        <div class="min-h-screen bg-gray-100">
            @livewire('notifications')
            <main>
                <section class="hero" id="home">
                    {{ $slot }}
                </section>

            </main>
        </div>
    </body>

    @filamentScripts
</html>
