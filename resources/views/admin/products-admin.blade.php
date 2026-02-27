@extends("./layouts/layaout-admin")
@section("styles")
   <link rel="stylesheet" href="{{  asset("/css/admin/products.css") }}">
@endsection
@section("description")

@endsection
@section("content")
   <section class="menu">
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
                    <img src="{{ $product->img }}" alt="Product Foto">
                    <div class="info">
                        <ul>
                            <li>id : {{ $product->id }}</li>
                            <li>цена : {{ $product->cost }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
            <a href="" class="add-card">
                +
            </a>
            <div class="pagination">
                {{  $products->links() }}
            </div>
        </div>
   </section>
@endsection