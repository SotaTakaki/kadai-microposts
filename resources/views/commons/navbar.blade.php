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
                <li class="nav-item">{!! link_to_route("users.index", "Users", [], ["class => "nav-link"]) !!}</li>
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
        </div>
    </nav>
</header>