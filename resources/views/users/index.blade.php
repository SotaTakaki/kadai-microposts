@extends("layouts.app")

@section("content")
    {{-- リコメンド --}}
    <h5 class="border-bottom mb-4">レコメンドユーザー<h5>
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
                @if (($authUser->affiliation == $user->affiliation) && ($authUser->affiliation != null) && ($authUser->id != $user->id))
                    <div class="card mr-4 mb-4  col-sm-2">
                        <div class="card-header">
                            <h5 class="card-title text-nowrap">{{ $user->name }}</h5>
                            {!! link_to_route("users.show", "View profile", ["user" => $user->id], ['class' => 'btn btn-outline-primary btn-sm']) !!}
                        </div>
                        <div class="card-body">
                            {{-- ユーザー画像 --}}
                            <img class="rounded img-fluid" src="{{ asset("storage/profiles/".$user->profile_image) }}" alt="プロフィール画像">
                        </div>
                    </div>
                    <?php $flag = 1 ?>
                @endif
            @endforeach
            @if ($flag == 0)
                <h5>オススメのユーザーが見つかりませんでした。</h5>
            @endif
        </div>
    </div>
    
    {{-- ユーザー一覧 --}}
    <h1 class="border-bottom mb-4">ユーザー一覧</h1>
    {{ Form::open(['action' => 'UsersController@index', 'method' => 'GET', "class" => "d-flex"]) }}
        {{ Form::text("name", "", ["class" => "mr-1"]) }}
        {{ Form::submit("Search") }}
    {{ Form::close() }}
    
    @include("users.users")
@endsection