@extends("./layouts/layaout")
@section("styles")
    <link rel="stylesheet" href="./css/main.css">
@endsection
@section("description")

@endsection
@section("content")
    <section class="banner">
        <img src="./images/PizzaFull.png">
        Окунитесь в мир вкуса
    </section>
    <section class="info about">
        <h1>Актуальные акции сегодня</h1>
        <div class="card-container">
            <div class="card">
                <img>
                <p></p>
                <a></a>
            </div>
        </div>
    </section>
    <section class="info popular">
        <h1>Новинки в меню</h1>
         <div class="menu-card">
                <h2>Название</h2>
                <img src="" alt="">
                <p>
                    Цена
                </p>
                <span>
                    Описание
                </span>
                @if(empty(session("userId")))
                    <div>
                        <form>
                            <input type="number" hidden>
                            <button type="submit">Подробнее</button>
                        </form>
                    </div>
                @else
                    <div>
                        <form>
                            <input type="number" hidden>
                            <button type="submit">Подробнее</button>
                        </form>
                        <form>
                            <input type="number" hidden>
                            <button type="submit">В корзину</button>
                        </form>
                    </div>
                @endif
            </div>

    </section>
    <section class="info reviews">
        <h1>Последние отзывы наших клиентов</h1>
         <div class="rewiew-card">
            <h1>Пользователь</h1>
            <img>
            <div class="stars">

            </div>
            <div class="text">

            </div>
        </div>
    </section>
@endsection