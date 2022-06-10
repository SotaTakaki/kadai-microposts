<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
        @if (Auth::id() == $user->id)
            {!! link_to_route('users.profile_edit', 'Edit_profile', ["id" => $user->id], ['class' => 'btn btn-outline-success btn-sm']) !!}
        @endif
    </div>
    <div class="card-body">
        {{-- ユーザー画像 --}}
        <img class="rounded img-fluid" src="{{ asset("storage/profiles/".$user->profile_image) }}" alt="プロフィール画像">
    </div>
</div>
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')
