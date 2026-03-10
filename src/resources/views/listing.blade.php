@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/listing.css') }}">
@endsection
@section('content')
    <div class="listing-title">
        <h1>商品の出品</h1>
    </div>
    <form class="listingform" action="{{ route('sell.listing') }}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="content-group">
            <div class="content-group__title">
                <label>商品画像</label>
            </div>
            <div class="image-group">
                <img class="image_output" id="image_output">
                <div class="label-group">
                    <label class="label-group__label" for="profile_image">画像を選択する</label>
                </div>
                <div>
                    <input class="image_file" type="file" id="profile_image" name="image">
                </div>
            </div>
            <div>
                @if ($errors->has('image'))
                    <div class="form__error">
                        {{ $errors->first('image') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="product-title">
            <label>商品の詳細</label>
        </div>
        <div>
            <div class="category-title">
                <label class="category-title__label">カテゴリー</label>
            </div>
            <div class="category-group">
                @foreach ($categories as $category)
                    <label class="category-item">
                        <input type="checkbox" name="category_id[]" value="{{$category->id}}">{{ $category->category }}
                    </label>
                @endforeach
            </div>
            <div class="form__error">
                @if($errors->has('category_id[]'))
                    <div class="error">{{ $errors->first('category_id[]') }}</div>
                @endif
            </div>
        </div>
        <div class="condition-group">
            <label class="condition-group__title">商品の状態</label>
        </div>
        <div>
            <select class="condition-select" name="condition_id">
                <option value="">選択してください</option>
                @foreach ($conditions as $condition )
                    <option class="condition-select__option" value="{{ $condition->id }} {{old('condition_id')==$condition->id ? 'selected' : ''}}"> {{ $condition->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form__error">
            @if($errors->has('condition_id'))
                <div class="error">{{ $errors->first('condition_id') }}</div>
            @endif
        </div>
        <div class="product-title">
            <label>商品名と説明</label>
        </div>
        <div class="product-group">
            <div class="product-label-group">
                <label class="product-label-group__label">商品名</label>
            </div>
            <div>
                <input class="product-label" type="text" name="product_name">
            </div>
            <div class="form__error">
                @if($errors->has('product_name'))
                    <div class="error">{{ $errors->first('product_name') }}</div>
                @endif
            </div>
        </div>
        <div class="product-group">
            <div class="product-label-group">
                <label class="product-label-group__label">ブランド名</label>
            </div>
            <div>
                <input class="product-label" type="text" name="brand" value="">
            </div>
            <div class="form__error">
                @if($errors->has('brand'))
                    <div class="error">{{ $errors->first('brand') }}</div>
                @endif
            </div>
        </div>
        <div class="product-group">
            <div class="product-label-group">
                <label class="product-label-group__label">商品の説明</label>
            </div>
            <div>
                <textarea class="product-group__textarea" name="product_description"></textarea>
            </div>
            <div class="form__error">
                @if($errors->has('product_description'))
                    <div class="error">{{ $errors->first('product_description') }}</div>
                @endif
            </div>
        </div>
        <div class="product-group">
            <div class="product-label-group">
                <label class="product-label-group__label">販売価格</label>
            </div>
            <div>
                <div>
                    <span>￥</span>
                    <input class="product-label" type="text" name="price" value="{{ old('price') }}">
                </div>
                
            </div>
            <div class="form__error">
                @if($errors->has('price'))
                    <div class="error">{{ $errors->first('price') }}</div>
                @endif
            </div>
        </div>
        <div class="button-group">
            <button class="listing-submit">出品する</button>
        </div>
    </form>
    <script src="{{ asset('js/image_call.js')}}"></script>
@endsection