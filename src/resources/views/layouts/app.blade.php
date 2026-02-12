<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flea-market</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
     <link href="https://use.fontawesome.com/releases/v6.7.2/css/all.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    <header>
        <nav class="header__nav">
            <ul class="header__nav-list">
                <li class="header__nav-logo">
                    <a href="/">COACHTECH</a>
                </li>
                <div class="header__nav-group">
                    @if (Route::currentRouteName() === 'login')
                        <li class="header__nav-item">
                            <input type="text" placeholder="なにをお探しですか？">
                        </li>
                        <li class="header__nav-item">
                            <a href="/login">ログアウト</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="">マイページ</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="">出品</a>
                        </li>
                    @endif
                </div>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    
</body>
</html>