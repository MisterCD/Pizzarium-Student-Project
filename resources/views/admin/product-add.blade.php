@extends("./layouts/layaout-admin")
@section("styles")
   <link rel="stylesheet" href="/css/admin/product-add.css">
@endsection
@section("description")

@endsection
@section("content")
   <section class="product">
        <form>
            <h1>Добавить товар</h1>
            <label for="file">Выберите изображение</label>
            <input type="file" id="file" hidden>
            <input type="number" placeholder="Цена">
            <textarea placeholder="Описание" name="description">
                
            </textarea>
            <button type="submit">Создать</button>
        </form>
   </section>
@endsection