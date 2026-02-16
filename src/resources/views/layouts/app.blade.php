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
            <div class="header__nav-logo">
                <a href="/">
                    <input type="image" src="{{ asset('image/COACHTECHヘッダーロゴ.png') }}" alt="ロゴ">
                </a>
            </div>
            <div class="header__nav-group">
               @auth
                    <div>
                        <input class="header__nav-sarch" type="text" placeholder="なにをお探しですか？">
                    </div>
                    <div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="header__nav-logout" type="submit">ログアウト</button>
                        </form>
                    </div>
                    <div>
                        <form action="" method="post">
                            @csrf
                            <button class="header__nav-mypage" type="submit">マイページ</button>
                        </form>
                    </div>
                @endauth
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    
</body>
</html>