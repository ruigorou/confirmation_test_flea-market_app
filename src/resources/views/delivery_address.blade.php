@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/delivery_address.css') }}">
@endsection
@section('content')
    <form class="address-form" action="{{ route('address.update',['item_id'=>$user->id]) }}" method="post">
        @csrf
        <div class="address-form__title">
            <h1 class="address-form__heading">住所の変更</h1>
        </div>
        <div  class="address-form__group">
            <div>
                <div>
                     <label class="address-form__label">郵便番号</label>
                </div>
                <div>
                     <input class="address-form__input" name="post" type="text" value="{{ old('post', $user->profile->post) }}">
                </div>
            </div>
            <div class="form__error">
                @if($errors->has('post'))
                    <div class="error">{{ $errors->first('post') }}</div>
                @endif
            </div>
        </div>
        <div>
            <div  class="address-form__group">
                <label class="address-form__label">住所</label>
                <input class="address-form__input" name="address" type="text" value="{{ old('address', $user->profile->address) }}">
            </div>
            <div class="form__error">
                @if($errors->has('address'))
                    <div class="error">{{ $errors->first('address') }}</div>
                @endif
            </div>
        </div>
        <div>
            <div class="address-form__group">
                <label class="address-form__label">建物名</label>
                <input class="address-form__input" type="text" name="building" value="{{ old('building', $user->profile->building) }}">
            </div>
            <div class="form__error">
                @if($errors->has('building'))
                    <div class="error">{{ $errors->first('building') }}</div>
                @endif
            </div>
        </div>
        <div class="address-form__button">
            <input type="hidden" name="item_id" value="{{ $item_id }}">
            <button class="address-form__submit" type="submit">更新する</button>
        </div>
    </form>
@endsection