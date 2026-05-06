@extends("./layouts/layaout-admin")
@section("styles")
   <link rel="stylesheet" href="{{  asset("/css/admin/products.css") }}">
@endsection
@section("description")

@endsection
@section("content")
    <div class="tool">
        <form method="post" action="{{ route("deleteProduct") }}">
            @csrf
            <input type="number" name="productId" class="productId" hidden>
            <button>Удалить</button>
        </form>
        <form method="get" action="{{ route("changeProductPage") }}">
             @csrf
            <input type="number" name="productId" class="productId" hidden>
            <button>Редактировать</button>
        </form>
        <form method="get" action="{{ route("product-page") }}">
             @csrf
            <input type="number" name="id" class="productId" hidden>
            <button>Посмотреть</button>
        </form>
   </div>
   <section class="menu">
        <form class="filter" action {{ route("products") }}>
            <button type="button" id="menu-button">Тип</button>
            <div class="menu-type" style="display:none;">
                <div class="checkbox">
                    <p>Пицца</p>
                    <input type="checkbox" value="0" name="pizza">
                </div>
                <div class="checkbox">
                    <p>Напитки</p>
                    <input type="checkbox" value="2" name="drink">
                </div>
                <div class="checkbox">
                    <p>Закуски</p>
                    <input type="checkbox" value="1" name="eat">
                </div>
            </div>
            <div class="cost-bar">
               <input type="number" name="min" placeholder="Минимум">
               <input type="number" name="max" placeholder="Максимум">
            </div>
            <select name="reverse">
                <option value="asc">По возрастанию</option>
                <option value="desc">По Убыванию</option>
            </select>
            <button type="submit" id="menu-button">Фильтровать</button>


        </form>
        <div class="menu-list">
            @foreach ($products as $product)
                <div class="menu-card">
                    <h2>{{ $product->name }}</h2>
                    <img src="{{ "../".$product->img }}" alt="Product Image">
                    <p>
                        {{ $product->cost }}
                    </p>
                    <span>
                        {{ $product->description }}
                    </span>
                    <input type="number" value="{{ $product->id }}" hidden>
                </div>
            @endforeach
            <a href="{{ route("product-add") }}" class="add-card">
                +
            </a>
            <div class="pagination">
                {{  $products->links("vendor.pagination.default") }}
            </div>
        </div>
   </section>
@endsection
@section("scripts")
    <script src="{{ asset("js/menu.js") }}"></script>
    <script src="{{ asset("js/admin/products.js") }}"></script>
@endsection