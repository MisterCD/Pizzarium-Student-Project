<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config("app.name") }}</title>
        <link rel="shortcut icon" href="" type="image/x-icon">
        <link rel="stylesheet" href="./css/app.css">
        <link rel="shortcut icon" href="./images/Logo.svg" type="image/x-icon">
        @yield("styles")
        <meta name="description" text="@yield("description")">
    </head>
    <body class="antialiased">
            <header>
                <div class="leftside">
                    <div class="logo">
                        <a href="{{ route("main") }}"><img src="./images/Logo.svg"></a>
                    </div>
                    <nav>
                        <a href="{{ route("menu") }}">Меню</a>
                        <a href="{{ route("special") }}">Акции</a>
                        <a href="{{ route("about") }}">О нас</a>
                        <a href="{{ route("rewiews") }}">Отзывы</a>
                        <a href="{{ route("admin") }}">Админ</a>
                    </nav>
                </div>
                <div class="rightside">
                    @if(request()->route()->getName() == "user")
                         <a href="{{ route("logout") }}">
                               Выход
                         </a>
                        <div class="avatar">
                            <img src="{{ session("avatarLink") }}">
                        </div>
                    @else
                        @if (!empty(session("username")))
                        <div class="vallet">
                        {{ session("vallet") }} р
                        </div>
                        <a href="">
                            <div class="bascket">
                                <img src="./images/basket.svg">
                            </div>
                        </a>
                        <a href="">
                            <div class="bascket">
                                <img src="./images/notification.svg">
                            </div>
                        </a>
                        <a href="{{ route("user") }}">
                                {{ session("username") }}
                        </a>
                        <div class="avatar">
                            <img src="{{ session("avatarLink") }}">
                        </div>
                        @else
                            <a href="{{ route("register") }}">
                                Регистрация / Вход
                            </a>
                        <div class="avatar">
                            <img src="./images/avatar.svg">
                        </div>
                        @endif
                    @endif
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
                <div class="rook"></div>
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
            <footer>
                <div class="leftside">
                 <div class="logo">
                    <img src="./images/Logo.svg">
                 </div>
                 <nav>
                        <a>Меню</a>
                        <a>Акции</a>
                        <a href="">Отзывы</a>
                        <a>О нас</a>
                 </nav>
                </div>
                 <div class="contacts">
                    Этот сайт создан в учебных целях все локации имена и контактные данные вымешленные!
                 </div>
            </footer>
                @yield("scripts")
                <script src="./js/app.js"></script>
                @if(Route::currentRouteName() != "main")
                    <script src="./js/random.js"></script>
                @endif
    </body>
</html>
