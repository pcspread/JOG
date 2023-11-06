<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="This is the jog site JOG.This is a portfolio site." />
    <title>JOG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layouts/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layouts/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/layouts/default.css') }}" />
    @yield('css')
    <script src="{{ asset('js/layouts/default.js') }}" defer></script>
    @yield('js')
</head>
<body>
    <header class="header" id="top">
        <div class="header-title">
            <div class="header-title__icon">
                <img class="header-title__icon-instance" src="{{ asset('img/JOG2_4.png') }}" alt="アイコン">
            </div>
            <div class="header-title__text">
                <a class="header-title__text-instance" href="/">JOG</a>
            </div>
        </div>
        <nav class="header-nav">
            <ul class="header-nav__list">
                <li class="header-nav__item">
                    <a class="header-nav__link" href="/jobs">求人一覧</a>
                    @if (Auth::check())
                    <a class="header-nav__link" href="/mypage">マイページ</a>
                    <a class="header-nav__link" href="/logout">ログアウト</a>
                    @else
                    <a class="header-nav__link" href="/register">新規作成</a>
                    <a class="header-nav__link" href="/login">ログイン</a>
                    @endif
                </li>
            </ul>
        </nav>
        <div class="burger">
            <div class="burger-border first"></div>
            <div class="burger-border second"></div>
            <div class="burger-border third"></div>
        </div>
        <div class="mask"></div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <aside class="aside">
        <div class="comment">
            @if (session('success'))
            <p class="comment-text success">{{ session('success') }}</p>
            @elseif (session('danger'))
            <p class="comment-text danger">{{ session('danger') }}</p>
            @endif
        </div>
        <div class="upper">
            <a class="upper-click" href="#top"><</a>
        </div>
    </aside>
</body>
</html>