@if (count($microposts) > 0)
    <div class="row">
        <ul class="list-unstyled">
            @foreach ($microposts as $micropost)
                <li class="media mb-3 col-3">
                {{--    <img class="mr-2 rounded img-fluid" src="{{ asset("storage/profiles/".str_replace('public/profiles/', '',$micropost->user->profile_image)) }}" alt="プロフィール画像"> --}}
                    <img class="mr-2 rounded img-fluid" src="{{ asset("storage/profiles/".$micropost->user->profile_image) }}" alt="プロフィール画像">    
                    <div class="media-body">
                        <div>
                            {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            {!! link_to_route("users.show", $micropost->user->name, ["user" => $micropost->user->id]) !!}
                            <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                        </div>
                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                        </div>
                        <div class="d-flex">
                            <div class="mr-2">
                                @include("user_favorite.favorite_button")
                            </div>
                            <div class="mr-2">
                                @if (Auth::id() == $micropost->user_id)
                                    {{-- 投稿編集画面へのリンク --}}
                                    {!! link_to_route('microposts.edit', 'Edit', ['micropost' => $micropost->id], ['class' => 'btn btn-outline-success btn-sm']) !!}
                                @endif
                            </div>
                            <div>
                                @if (Auth::id() == $micropost->user_id)
                                    {{-- 投稿削除ボタンのフォーム --}}
                                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    {{ $microposts->links() }}
@endif