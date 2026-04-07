@extends("./layouts/layaout-admin")
@section("styles")
   <link rel="stylesheet" href="/css/admin/product-add.css">
@endsection
@section("description")

@endsection
@section("content")
   <section class="product">
     <form method="post">
         <div class="img-section">
            <input type="text" placeholder="Название товара">
            <img id="prewiew">
            <label for="file">Выберите изображение</label>
            <input type="file" id="file" hidden name="img">
            <textarea name="description-sized">Краткое описание

            </textarea>
         </div>
         <div class="text-section">
            <h1>Описание</h1>
            <textarea name="description-full"><h2> Заголовок </h2>
                <p>Параграф</p>
                <!-- Слайдер -->
                <slider-component>
                  <img src="">
                  <img src="">
                  <img src="">
                </slider-component>
текст

            </textarea>
         </div>
         <div class="create-section">
            <input type="number" placeholder="Цена" name="price">
            <button type="submit">Создать</button>
         </div>
     </form>
   </section>
@endsection
@section("scripts")
   <script src="{{ asset("js/admin/product-add.js") }}"></script>
@endsection