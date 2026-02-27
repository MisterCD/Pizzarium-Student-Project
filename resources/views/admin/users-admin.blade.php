@extends("/layouts/layaout-admin")
@section("styles")
    <linK rel="stylesheet" href="./css/admin/user.css">
@endsection
@section("description")

@endsection
@section("content")
   <div class="tool">
        <form method="post" action="{{ route("deleteUser") }}">
            @csrf
            <input type="number" name="userId" class="userId" hidden>
            <button>Удалить</button>
        </form>
        <form method="post" action="{{ route("setAdmin") }}">
             @csrf
            <input type="number" name="userId" class="userId" hidden>
            <button>Сделать Админом</button>
        </form>
   </div>
   <section class="Users">
        @foreach ($users as $user)
            <div class="user-card">
            <div class="avatar">
                <img src="{{ $user->avatar == "./images/avatar.svg" ? "./images/avatar.svg" : "storage/".$user->avatar}}">
            </div>
            <h2 style="{{ $user->isAdmin == 0 ? "" : "background:green"}}">{{ $user->username }}</h2>
            <div class="info">
                <ul>
                    <li>id : {{ $user->id }}</li>
                    <li>Почта : {{ $user->email }}</li>
                    <li>Телефон : {{ $user->tel }}</li>
                    <li>Кошелек : {{ $user->vallet }}</li>
                </ul>
            </div>
            <input type="number" hidden value="{{ $user->id }}">
        </div>
        @endforeach
        <div class="pagination">
            {{ $users->links("vendor.pagination.default") }}
        </div>
   </section>
@endsection
@section("scripts")
    <script src="./js/admin/user.js"></script>
@endsection