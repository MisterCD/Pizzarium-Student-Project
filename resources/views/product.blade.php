@extends("./layouts/layaout")
@section("styles")
     <link rel="stylesheet" href="{{ asset("css/product.css") }}">   
@endsection
@section("description")
   
@endsection
@section("content")
   <section class="product">
        <div class="product-info">
            <div class="menu-card">
               <h2>{{ $product->name }}</h2> 
               <img src="{{ $product->img }}">
               <p>
                  {{ $product->cost }}
               </p>
               <span>
                  {{ $product->description }}
               </span>
            </div>
        </div>
        <div id="product-description">
            {!! $product->description_full !!}
        </div>
   </section>
@endsection

@section("scripts")
     <script src="{{ asset("js/product.js") }}"></script>
@endsection