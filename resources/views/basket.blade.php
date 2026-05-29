@extends("./layouts/layaout")
@section("styles")
   <link rel="stylesheet" href="{{ asset("/css/basket.css") }}">
@endsection
@section("description")
    
@endsection
@section("content")
    @php
        $count = 0;
    @endphp
   <section class="basket">
        <div class="product-list">
        @foreach ($Products as $product)
            <div class="menu-card">
                <h2>{{ $product->name }}</h2>
                <img loading="lazy" src=" {{ $product->img }}" alt="product image">
                <p>
                    {{ $product->cost }}
                </p>
                <span>
                    {{ $product->description }}
                </span>
                <div>
                <form action="{{ route("product-page") }}">
                    <input type="number" name="id" hidden value="{{ $product->product_id }}">
                    <button type="submit">Подробнее</button>
                </form>
                <form action="{{ route("deleteBasket") }}">
                    <input type="number" name="id" hidden value="{{ $product->id }}">
                    <button type="submit">Удалить</button>
                </form>
                </div>
            </div>
            @php
                $count += $product->cost;
            @endphp
        @endforeach
        </div>
   </section>
   <section class="buy">
        <div>
            Итого: {{ $count }}р
        </div>
        <form>
            <input type="test" placeholder="adress" value="{{empty($user->adrees) ? "Неизвестен" : $user->adrees}}">
            <button type="submit">Оплатить</button>
        </form>
   </section>
@endsection