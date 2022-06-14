@if (count($users) > 0)
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
                <div class="card mr-4 mb-4 col-sm-3">
                    <div class="card-header">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        {!! link_to_route("users.show", "View profile", ["user" => $user->id], ['class' => 'btn btn-outline-primary btn-sm']) !!}
                    </div>
                    <div class="card-body">
                        {{-- ユーザー画像 --}}
                        <img class="rounded img-fluid" src="{{ asset("storage/profiles/".$user->profile_image) }}" alt="プロフィール画像">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $users->links() }}
@else
    <h5>ユーザーが存在しません。</h5>
@endif
