@extends("./layouts/layaout")
@section("styles")
   <link rel="stylesheet" href="./css/user.css">
@endsection
@section("description")

@endsection
@section("content")
   <section>
        <div class="user-view">
            <h1>
               {{ session("username") }}
            </h1>
            <div class="avatar">
               <img src="{{ session("avatarLink") }}">
            </div>
            <div class="info">
               <ul>
                  <li>Почта : {{ $user->email }}</li>
                  <li>Адрес : {{ empty($user->adrees) ? "Неизвестен" : $user->adrees }}</li>
                  <li>Телефон : {{ $user->tel }}</li>
               </ul>
            </div>
        </div>
         <div class="user-container">
            <form method="post" action="{{ route("addMoney") }}">
               <p class="count">
                  {{ session("vallet") }} р
               </p>
               <h1>Кошелек</h1>
               @csrf
               <input type="number" placeholder="сумма" name="cost">
               <button type="submit">Пополнить</button>
            </form>
            <form method="post" action="{{ route("delete") }}">
               <h1>Удалить</h1>
               @csrf
               <input type="password" placeholder="Пароль">
               <button>Удалить аккаунт</button>
            </form>
        </div>
        <div class="user-change">
            <form action="{{ route("change") }}" method="post">
               <h1>Изменить юзернейм</h1>
               @csrf
               <input type="text" placeholder="Новый юзернейм" name="newusername">
               <span class="error">
                   @error("newusername")
                     {{ $message }}
                   @enderror
               </span>
               <button type="submit">Изменить</button>
            </form>
            <form  action="{{ route("change") }}" method="post">
               <h1>Изменить пароль</h1>
               @csrf
               <input type="password" placeholder="Новый пароль" name="newpassword">
               <span class="error">
                   @error("newpassword")
                     {{ $message }}
                   @enderror
               </span>
               <input type="password" placeholder="Потверждение пароля">
               <button type="submit">Изменить</button>
            </form>
            <form  action="{{ route("change") }}" method="post">
               <h1>Изменить Адрес</h1>
               @csrf
               <input type="text" placeholder="Адрес" name="adrees">
               <span class="error">
                  @error("adrees")
                     {{ $message }}
                  @enderror
               </span>
               <button type="submit">Изменить</button>
            </form>
            <form  action="{{ route("change") }}" method="post" enctype="multipart/form-data">
               <h1>Изменить Аватар</h1>
               @csrf
               <label for="file">
                  <div class="avatar">
                        <img id="prewiew" src="{{ session("avatarLink") }}">
                  </div>
                  <div class="button">Выберите изображение</div>
               </label>
               <span class="error">
                     @error("avatar")
                        {{ $message }}
                     @enderror
               </span>
               <input type="file" hidden id="file" name="avatar">
               <button type="submit">Изменить</button>
            </form>
            <form  action="{{ route("change") }}" method="post">
               <h1>Изменить Телефон</h1>
               @csrf
               <input type="tel" placeholder="7-999-99-99-999" name="tel">
               <span class="error">
                  @error("adrees")
                     {{ $message }}
                  @enderror
               </span>
               <button type="submit">Изменить</button>
            </form>
        </div>
   </section>
   @if (!empty(session("error")))
      <div class="notification" id="notification" style="color:red;">
         Ошибка:{{ session("error") }}
      </div>
   @endif
   @if (!empty(session("message")))
      <div class="notification" id="notification" style="color:green;">
         {{ session("message") }}
      </div>
   @endif
@endsection
@section("scripts")
   <script src="./js/user.js"></script>
@endsection