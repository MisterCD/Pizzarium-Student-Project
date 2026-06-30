@extends("./layouts/layaout")
@section("styles")
   <link rel="stylesheet" href="{{ asset("css/special.css") }}">
@endsection
@section("description")

@endsection
@section("content")
   <section class="special">
      <div class="special-container" id="special1">
         <img src="{{ asset("images/gift.png") }}">
         <p>
            скидка 20% на пиццу при заказе от 1000 рублей
         </p>
      </div>
      <div class="special-container">
         <img src="">
         <p>2 пиццы в заказе 3-я в подарок!</p>
         <img src="">
         <img src="">
      </div>
   </section>
@endsection