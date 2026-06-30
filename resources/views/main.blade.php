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
    <section class="info special">
        <h1>Актуальные акции сегодня</h1>
        <div class="special-container" id="special1">
         <img src="{{ asset("images/gift.png") }}">
         <p>
            скидка 20% на пиццу при заказе от 1000 рублей
         </p>
        </div>
    </section>
    <section class="info menu">
        <h1>Новинки в меню</h1>
         @foreach ($products as $product)
            <div class="menu-card">
                <h2>{{ $product->name }}</h2>
                <img loading="lazy" src=" {{ $product->img }}" alt="product image">
                <p>
                    {{ $product->cost }}
                </p>
                <span>
                    {{ $product->description }}
                </span>
                @if(empty(session("userId")))
                    <div>
                        <form action="{{ route("product-page") }}">
                            <input type="number" name="id" hidden value="{{ $product->id }}">
                            <button type="submit">Подробнее</button>
                        </form>
                    </div>
                @else
                    <div>
                        <form action="{{ route("product-page") }}">
                            <input type="number" name="id" hidden value="{{ $product->id }}">
                            <button type="submit">Подробнее</button>
                        </form>
                        <form method="post" action="{{ route("addBasket") }}">
                            @csrf
                            <input type="number" name="id" hidden value="{{ $product->id }}">
                            <button type="submit">В корзину</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </section>
    <section class="info reviews">
        <h1>Последние отзывы наших клиентов</h1>
         @foreach ($rewiews as $rewiew)
            <div class="rewiew-card">
               <h2>{{ $rewiew->username }}</h2>
               <img src="{{ asset("storage/".$rewiew->avatar) }}">
                <div class="stars">
                    @for ($i = 1; $i <= $rewiew->stars; $i++)
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                        </div>
                    @endfor
                </div>
                <div class="text">
                    {{ $rewiew->text }}
                </div>
            </div>
        @endforeach
    </section>
@endsection