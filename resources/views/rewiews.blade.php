@extends("./layouts/layaout")
@section("styles")
   <link rel="stylesheet" href="./css/rewiew.css">
@endsection
@section("description")

@endsection
@section("content")
   <section class="rewiews-section">
        <div class="filter">
            <form action="{{ route("rewiews") }}">
                <button id="clear" type="button">Очистить</button>
                <input type="number" name="stars" hidden>
                <div id="stars_filter">
                    
                </div>
                <select name="reverse">
                    <option value="asc">По возрастанию</option>
                    <option value="desc">По убыванию</option>
                    <option value="old_id">Новые</option>
                    <option value="new_id">Старые</option>
                </select>
                <button type="submit">Фильтровать</button>
            </form>
        </div>
       <div class="rewiews-container">
        @foreach ($rewiews as $rewiew)
            <div class="rewiew-card">
               <h2>{{ $rewiew->username }}</h2>
               <img src="{{ $rewiew->avatar }}">
                <div class="stars">
                    @for ($i = 1; $i <= $rewiew->stars; $i++)
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                        </div>
                    @endfor
                </div>
                <div class="text">
                    {{ $rewiew->text }}
                </div>
            </div>
        @endforeach
        </div>
        <div class="pagination">
            {{ $rewiews->links("vendor.pagination.default") }}
        </div>
   </section>
   @if(!empty(session("userId")))
   <section class="rewiew">
        <form method="post" action="{{ route("new-rewiew") }}">
            @csrf
            <h2>Оставить отзыв</h2>
            <input name="stars" type="number" hidden>
            <div id="stars_send">
                
            </div>
            <textarea name="rewiew">

            </textarea>
            <button type="submit">Отправить</button>
        </form>
   </section>
   @endif
@endsection
@section("scripts")
    <script src="{{ asset("js/rewiew.js") }}"></script>
@endsection