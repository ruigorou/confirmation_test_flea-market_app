@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile_setting.css') }}">
@endsection
@section('content')
    <form class="profile-setting-form" action="{{ route('mypage.profile_setting') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="profile-setting-title">
            <h2>プロフィール設定</h2>
        </div>
        <div class="image-group">
            <div class="image-group__image">
                <img class="image_output" id="image_output">
            </div>
            <div>
                <div class="label-group">
                    <label class="image-label" for="profile_image">ファイルの選択</label>
                </div>
                <input class="image_file" type="file" id="profile_image" name="image">
            </div>
        </div>
         @if ($errors->has('image'))
            <div class="form__error">
                {{ $errors->first('image') }}
            </div>
        @endif
        <div class="content-group">
            <div>
                <label>ユーザー名</label>
            </div>
            <div>
                <input class="content-group__input" type="text" name="name" value="{{ old('name', $user->name) }}">
            </div>
             @if ($errors->has('name'))
                <div class="form__error">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
         <div class="content-group">
            <div>
                <label>郵便番号</label>
            </div>
            <div>
                <input class="content-group__input" type="text" name="post" value="{{ old('post') }}">
            </div>
             @if ($errors->has('post'))
                <div class="form__error">
                    {{ $errors->first('post') }}
                </div>
            @endif
        </div>
         <div class="content-group">
            <div>
                <label>住所</label>
            </div>
            <div>
                <input class="content-group__input" type="text" name="address" value="{{ old('address') }}">
            </div>
             @if ($errors->has('address'))
                <div class="form__error">
                    {{ $errors->first('address') }}
                </div>
            @endif
        </div>
         <div class="content-group">
            <div>
                <label>建物名</label>
            </div>
            <div>
                <input class="content-group__input" type="text" name="building" value="{{ old('building') }}">
            </div>
        </div>
        <div>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <button class="profile-setting-form__button" type="submit">更新する</button>
        </div>

    </form>
    <script src="{{ asset('js/image_call.js')}}"></script>
@endsection