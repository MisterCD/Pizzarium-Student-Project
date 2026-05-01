@extends("./layouts/layaout")
@section("styles")
   <link href="./css/menu.css" rel="stylesheet">
@endsection
@section("description")

@endsection
@section("content")
   <section class="menu">
        <h1>Наше меню</h1>
        <form class="filter">
            <button type="button" id="menu-button">Тип</button>
            <div class="menu-type" style="display:none;">
                <div class="checkbox">
                    <p>Пицца</p>
                    <input type="checkbox">
                </div>
                <div class="checkbox">
                    <p>Напитки</p>
                    <input type="checkbox">
                </div>
                <div class="checkbox">
                    <p>Закуски</p>
                    <input type="checkbox">
                </div>
            </div>
            <div class="cost-bar">
               <input type="number" name="min" placeholder="Минимум">
               <input type="number" name="max" placeholder="Максимум">
            </div>
            <select>
                <option>По возрастанию</option>
                <option>По Убыванию</option>
            </select>
            <button type="submit" id="menu-button">Фильтровать</button>


        </form>
        <div class="menu-list">
            @foreach ($products as $product)
            <div class="menu-card">
                <h2>{{ $product->name }}</h2>
                <img src=" {{ $product->img }}" alt="product image">
                <p>
                    {{ $product->cost }}
                </p>
                <span>
                    {{ $product->description }}
                </span>
                @if(empty(session("userId")))
                    <div>
                        <form>
                            <input type="number" hidden value="{{ $product->id }}">
                            <button type="submit">Подробнее</button>
                        </form>
                    </div>
                @else
                    <div>
                        <form>
                            <input type="number" hidden value="{{ $product->id }}">
                            <button type="submit">Подробнее</button>
                        </form>
                        <form>
                            <input type="number" hidden value="{{ $product->id }}">
                            <button type="submit">В корзину</button>
                        </form>
                    </div>
                @endif
            </div>
            @endforeach
            <div class="pagination">
                <a></a>
            </div>
        </div>
   </section>
@endsection
@section("scripts")
    <script src="./js/menu.js"></script>
@endsection