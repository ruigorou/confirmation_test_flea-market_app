@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('content')
<form class="form" action="{{ route('login') }}" method="post" novalidate>
        @csrf
        <div class="login-form">
            <div class="login-form__title">
                <h2>ログイン</h2>
            </div>
            <div class="login-form__group">
                <div>
                    <label>メールアドレス</label>
                </div>
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" >
                </div>
            </div>
            @if ($errors->has('email'))
                <div class="form__error">
                    {{ $errors->first('email') }}
                </div>
            @endif
            <div class="login-form__group">
                <div>
                    <label>パスワード</label>
                </div>
                <div>
                    <input type="password" name="password">
                </div>
            </div>
            <div class="form__error">
                @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="login-form__btn">
                <button type="submit">ログインする</button>
            </div>
            <div class="login-form__link">
                <a href="/register">会員登録はこちら</a>
            </div>
        </div>
    </form>
@endsection