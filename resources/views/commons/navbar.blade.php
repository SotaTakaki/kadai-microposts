<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページのリンク --}}
        <a class="navbar-brand" href="/">Microposts</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                {{-- ユーザー一覧ページへのリンク --}}
                <li class="nav-item">{!! link_to_route("users.index", "Users", [], ["class" => "nav-link"]) !!}</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdowm">{{ Auth::user()->name }}</a>
                    <ul class="dropdowm-menu dropdown-menu-right">
                        {{-- ユーザー詳細ページへのリンク --}}
                        <li class="dropdowm-item">{!! link_to_route("users.show", "My profile", ["user" => Auth::id()]) !!}</li>
                        <li class="dropdowm-divider"></li>
                        {{-- ログアウトへのリンク --}}
                        <li class="dropdowm-item">{!! link_to_route("logout.get", "Log out") !!}</li>
                    </ul>
                </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route("signup.get", "Signup", [], ["class" => "nav-link"]) !!}/li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route("login", "Login", [], ["class" => "nav-link"]) !!}</li>
                @endif
            </ul>
            <ul class="nav nav-tabs nav-justified mb-3">
                {{-- ユーザ詳細タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
                        TimeLine
                        <span class="badge badge-secondary">{{ $user->microposts_count }}</span>
                    </a>
                </li>
                {{-- フォロー一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
                        Followings
                        <span class="badge badge-secondary">{{ $user->followings_count }}</span>
                    </a>
                </li>
                {{-- フォロワー一覧タブ --}}
                <li class="nav-item">
                    <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
                        Followers
                        <span class="badge badge-secondary">{{ $user->followers_count }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>