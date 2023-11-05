@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')

    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
      </div>
      <form class="form" action="/confirm" method="post">
        @csrf
        <table>
          <tr class="form__group">         
            <th class="form__group-title">                
              <span class="form__label--item">お名前</span>
              <span class="form__label--required">※</span>                
            </th>
            <td class="form__group-content">
              <div class="form__group--name-item">
                <input class="form__group--name" type="text" name="fullname"  value="{{ old('fullname') }}"/>
                <p class="example">例）山田 太郎</p>
              </div>
    
              <div class="form__error">
                  <!--バリデーション機能を実装したら記述します。-->
                  @error('fullname')
                  {{ $message }}
                  @enderror
              </div>
            </td>           
          </tr>
          <tr class="form__group">            
            <th class="form__group-title">
              <span class="form__label--item">性別</span>
              <span class="form__label--required">※</span>
            </th>
            <td class="form__group-content">
              <div class="form__group-content-gender">
                <label class="gender">
                  <input class="radio" type="radio" name="gender" checked value="男性" value="{{ old('gender') }}"/><span class="gender-item"  >男性</span>
                </label>
                <label class="gender">
                  <input class="radio" type="radio" name="gender" value="女性" value="{{ old('gender') }}" /><span class="gender-item">女性</span>
                </label>
              </div>
              <div class="form__error">
                <!--バリデーション機能を実装したら記述します。-->
                @error('gender')
                {{ $message }}
                @enderror
              </div>
            </td>
          </tr>
          <tr class="form__group">
              <th class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
              </th>
              <td class="form__group-content">
                <div class="form__input--text">
                  <input type="email" name="email"  value="{{ old('email') }}"/>
                  <p class="example">例）test@example.com</p>
                </div>
                <div class="form__error">
                  <!--バリデーション機能を実装したら記述します。-->
                  @error('email')
                  {{ $message }}
                  @enderror
                </div>
              </td>
            </div>
          </tr>
          <tr class="form__group">
            <th class="form__group-title">
              <span class="form__label--item">郵便番号</span>
              <span class="form__label--required">※</span>
            </th>
            <td class="form__group-content">
              <div class="form__input--text">
                〒<input type="text" name="postcode"  value="{{ old('postcode') }}"/>
                <p class="example">例）123-4567</p>
              </div>
              <div class="form__error">
                <!--バリデーション機能を実装したら記述します。-->
                @error('postcode')
                {{ $message }}
                @enderror
              </div>
            </td>
          </tr>
          
          <tr class="form__group">
            <th class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </th>
            <td class="form__group-content">
                <div class="form__input--text">
                  <input type="text" name="address" value="{{ old('address') }}" />
                  <p class="example">例）東京都渋谷区千駄ヶ谷1-2-3</p>
                </div>
                <div class="form__error">
                  <!--バリデーション機能を実装したら記述します。-->
                  @error('address')
                  {{ $message }}
                  @enderror
                </div>
            </td>
          </tr>
          <tr class="form__group">
            <th class="form__group-title">
                <span class="form__label--item">建物名</span>
            </th>
            <td class="form__group-content">
                <div class="form__input--text">
                  <input type="text" name="building_name"  value="{{ old('building_name') }}"/>
                  <p class="example">例）千駄ヶ谷マンション101</p>
                </div>
                
            </td>
          </tr>
          <tr class="form__group">
            <th class="form__group-title">
                <span class="form__label--item">ご意見</span>
                <span class="form__label--required">※</span>
            </th>
            <td class="form__group-content">
              <div class="form__input--textarea" >
                <textarea name="opinion" >{{ old('opinion') }}</textarea>
              </div>
              <div class="form__error">
                <!--バリデーション機能を実装したら記述します。-->
                  @error('opinion')
                  {{ $message }}
                  @enderror
              </div>
            </td>
          </tr>
        </table>
            <div class="form__button">
              <button class="form__button-submit" type="submit">送信</button>
            </div> 
      </form>
    </div>
 @endsection