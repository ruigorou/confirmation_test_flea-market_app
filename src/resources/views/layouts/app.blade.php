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
    <header class="header">
        <div class="header__nav-logo">
            <a href="{{ route('mylist') }}">
                <input type="image" src="{{ asset('image/COACHTECHヘッダーロゴ.png') }}" alt="ロゴ">
            </a>
        </div>
        @auth
            <div class="search">
                <form action="{{ route('item.search') }}" method="get">
                    @csrf
                    <input class="search__box" name="keyword" type="text" placeholder="なにをお探しですか？" value="{{ old('keyword', request('keyword') ) }}">
                </form>
            </div>
            <div class="headerlink-group">
                <div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="header__nav-logout" type="submit">ログアウト</button>
                </form>
                </div>
                <div>
                    <a class="headerlink-group__mypage" href="{{ route('mypage') }}">マイページ</a>
                </div>
                <div>
                    <a class="header__listing" href="{{ route('sell') }}">出品</a>
                </div>
            </div>
        @endauth
    </header>
    <main>
        @yield('content')
    </main>
    
</body>
</html>