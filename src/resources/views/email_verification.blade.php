@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/email_verification.css') }}">
@endsection
@section('content')

<div class="contents">
    <div class="">
        <p>登録いただいたメールアドレスに認証メールを送付いたしました。</p>
        <p>メール認証を完了してください。</p>
    </div>
    <div>
        <form action="/profile">
            <button>認証はこちらから</button>
        </form>
    </div>
    <div>
        <button>認証メールを再送する</button>
    </div>
</div>


@endsection