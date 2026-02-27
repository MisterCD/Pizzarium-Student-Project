@extends("./layouts/layaout")
@section("styles")
   
@endsection
@section("description")

@endsection
@section("content")
   <section class="product">
        <form>
            <label for="file">Выберите изображение</label>
            <input type="file" id="file" hidden>
            <input type="number" placeholder="Цена">
            <textarea>

            </textarea>
            <button type="submit"></button>
        </form>
   </section>
@endsection