@extends("./layouts/layaout-admin")
@section("styles")
   <link rel="stylesheet" href="/css/admin/product-add.css">
@endsection
@section("description")

@endsection
@section("content")
   <section class="product">
     <form method="post" action="{{ route("changeProduct") }}" enctype="multipart/form-data">
         @csrf
         <div class="img-section">
            <input type="text" placeholder="Название товара" name="title" value="{{ $product->name }}">
            <img id="prewiew" src="{{ asset($product->img) }}">
            <label for="file">Выберите изображение</label>
            <input type="file" id="file" hidden name="img">
            <textarea name="descriptionTitle">{{ $product->description }}

            </textarea>
         </div>
         <div class="text-section">
            <h1>Описание</h1>
            <textarea name="description">
            {!!  $product->description_full !!}

            </textarea>
         </div>
         <div class="create-section">
            <input type="number" placeholder="Цена" name="price" value="{{ $product->cost }}">
            <select name="type">
               <option value="0">Пицца</option>
               <option value="1">Закуски</option>
               <option value="2">Напитки</option>
            </select>
            <button type="submit">Создать</button>
         </div>
     </form>
   </section>
   @if($errors->any())
   <div id="notification">
      <ul>
      @foreach ($errors->all() as $message)
         <li>
            {{ $message }}
         </li>
      @endforeach
      </ul>
   </div>
   @endif
   <section class="image-add">
     <form id="image-form" method="post">
       <h1>Изображения</h1>
       <img id="image-prewiew">
       <label for="image-file">Выберите файл</label>
       <input id="image-file" type="file" hidden>
       <button type="submit">Отправить</button>             
     </form>
     <div class="link-container">
          <h1>Ссылка</h1>
          <input id="image-link" type="text" readonly>
     </div>
   </section>
@endsection
@section("scripts")
   <script>
      globalThis.token = "{{ csrf_token() }}";
      globalThis.requestPath = "{{ route("newImage") }}";
   </script>
   <script src="{{ asset("js/admin/product-add.js") }}"></script>
@endsection