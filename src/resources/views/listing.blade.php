@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/listing.css') }}">
@endsection
@section('content')
    <h2>商品の出品</h2>
    <form class="listingform" action="{{ route('selll.listing') }}" method="post">
         <div class="image-group">
            <div>
                <label>商品画像</label>
            </div>
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
    </form>
@endsection