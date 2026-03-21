<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config("app.name") }}</title>
        <link rel="stylesheet" href="{{  asset("/css/app.css") }}">
        <style>
            .pizza{
                background: url({{  asset("/images/Глаз.png") }}) center no-repeat;
                background-size: cover;
            }
        </style>
        <link rel="shortcut icon" href="{{ asset("/images/Logo.svg") }}" type="image/x-icon">
        @yield("styles")
        <meta name="description" text="@yield("description")">
    </head>
    <body class="antialiased">
            <header>
                <div class="leftside">
                    <div class="logo">
                        <a href="{{ route("main") }}"><img src="{{  asset("/images/Logo.svg") }}"></a>
                    </div>
                    <nav>
                       <a href="{{ route("admin") }}">Пользователи</a>
                       <a href="{{ route("products") }}">Товары</a>
                       <a href="{{ route("admin") }}">Отзывы</a>
                       <a href="{{ route("admin") }}">Заказы</a>
                    </nav>
                </div>
            </header>
            <div id="background">
                <div class="pizza" id="pizza1"></div>
                <div class="pizza" id="pizza2"></div>
                <div class="pizza" id="pizza3"></div>
                <div class="pizza" id="pizza4"></div>
                <div class="pizza" id="pizza5"></div>
                <div class="pizza" id="pizza6"></div>
                <div class="pizza" id="pizza7"></div>
                <div class="pizza" id="pizza8"></div>
                <div class="pizza" id="pizza9"></div>
                <div class="pizza" id="pizza10"></div>
                <div class="fish" id="fish1"></div>
                <div class="fish" id="fish2"></div>
                <div class="fish" id="fish3"></div>
                <div class="fish" id="fish4"></div>
                <div class="vodrosli" id="vodrosli1"></div>
                <div class="vodrosli" id="vodrosli2"></div>
                <div class="vodrosli" id="vodrosli3"></div>
                <div class="vodrosli" id="vodrosli4"></div>
                <div id="ground1"></div>
                <div id="ground2"></div>
                <div id="ground3"></div>
            </div>
            <svg id="filter" style="position: fixed; top:0; left:0;">
            <filter id="water">
                    <feTurbulence
                        baseFrequency="0.02 0.04"
                        numOctaves="1"
                    >
                    <animate
                        attributeName="baseFrequency"
                        dur="10s"
                        values="0.02 0.04; 0.03 0.06; 0.04"
                        calcMode="paced"
                        repeatCount="indefinite"
                    />
                    </feTurbulence>
                    <feDisplacementMap
                        in="SourceGraphic"
                        scale="10"
                    />
                    <feGaussianBlur stdDeviation="0.5"/>
                </filter>
            </svg>
            <main>
                @yield("content")
            </main>
                @yield("scripts")
            <script src="{{ asset("/js/admin/app.js") }}"></script>
    </body>
</html>
