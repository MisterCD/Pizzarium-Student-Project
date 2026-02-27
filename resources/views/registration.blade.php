@extends("./layouts/layaout")
@section("styles")
   <link rel="stylesheet" href="./css/register.css">
@endsection
@section("description")

@endsection
@section("content")
   <section class="forms">
        <form action="{{ route("newUser") }}" method="post" id="register">
            <h1>Регистрация</h1>
            @csrf
            <span class="error">
                @error("email")
                    {{ $message }}
                @enderror
            </span>
            <input type="email" placeholder="example@gmail.com" name="email" value="{{ old("email") }}">
            <span class="error">
                @error("username")
                    {{ $message }}
                @enderror
            </span>
            <input type="text" placeholder="username" name="username" value="{{ old("username") }}">
            <span class="error">
                @error("tel")
                    {{ $message }}
                @enderror
            </span>
            <input type="tel" placeholder="7-929-27-33-223" name="tel" value="{{ old("tel") }}">
            <span class="error">
                @error("password")
                    {{ $message }}
                @enderror
            </span>
            <input id="password" type="password" placeholder="Пароль" name="password" value="{{ old("password") }}">
            <span id="error-message" class="error" id="password">

            </span>
            <input id="password-verefy" type="password" placeholder="Потверждение пароля">
            <button id="register-button" type="submit">Зарегистрироваться</button>
            <span class="error">
                {{ session("error") }}
            </span>
        </form>
        <div>
            Или
        </div>
        <form action="{{ route("login") }}" method="post">
            <h1>Авторизация</h1>
            @csrf
            <span class="error">
                @error("email-login")
                    {{ $message }}
                @enderror
            </span>
            <input type="email" placeholder="example@gmail.com" name="email-login" value="{{ old("email-login") }}">
             <span class="error">
                @error("password-login")
                    {{ $message }}
                @enderror
             </span>
            <input type="password" placeholder="********" name="password-login" value="{{ old("password-login") }}">
            <button type="submit">Логин</button>
             <span class="error">
                {{ session("error_login") }}
            </span>
        </form>
   </section>


@endsection
@section("scripts")
    <script src="./js/register.js"></script>
@endsection