@extends("./layouts/layaout")
@section("styles")
   
@endsection
@section("description")
    Страница Уведомлений
@endsection
@section("content")
   <section class="notification">
      @foreach ($Notifs as $notif)
      <div class="notification-card">
         <h2>{{ $notif->title }}</h2>
         <span class="description">
            {{ $notif->description }}
         </span>
         <a href="{{ route("deleteNotif", ["id" => $notif->id]) }}">Удалить</a>
      </div>
      @endforeach
   </section>
@endsection