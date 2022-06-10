@extends("layouts.app")

@section("content")
    {{-- ユーザー一覧 --}}
        <h1 class="border-bottom mb-4">ユーザー一覧</h1>
        {{ Form::open(['action' => 'UsersController@index', 'method' => 'GET', "class" => "d-flex"]) }}
            {{ Form::text("name", "", ["class" => "mr-1"]) }}
            {{ Form::submit("Search") }}
        {{ Form::close() }}
    @include("users.users")
@endsection