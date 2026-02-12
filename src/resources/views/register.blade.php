@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('content')
<form class="form" action="" method="post">
        @csrf
        <div class="register-form">
            <div class="register-form__title">
                <h2>会員登録</h2>
            </div>
            <div class="register-form__group">
                <div>
                    <label>お名前</label>
                </div>
                <div>
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form__error">
                @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="register-form__group">
                <div>
                    <label>メールアドレス</label>
                </div>
                <div>
                    <input type="text" name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form__error">
                @foreach($errors->get('email') as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            <div class="register-form__group">
                <div>
                    <label>パスワード</label>
                </div>
                <div>
                    <input type="password" name="password" value="">
                </div>
            </div>
            <div class="form__error">
                @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="register-form__group">
                <div>
                    <label>確認用パスワード</label>
                </div>
                <div>
                    <input type="password" name="password" value="">
                </div>
            </div>
            <div class="form__error">
                @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="register-form__btn">
                <button type="submit">登録する</button>
            </div>
            <div class="register-form__link">
                <a href="/login">ログインはこちら</a>
            </div>
        </div>
    </form>
@endsection