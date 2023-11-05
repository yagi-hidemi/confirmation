@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/find.css') }}" />
@endsection

</style>
@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>管理システム</h2>
  </div>
<div class="form">
  <form class="form-item" action="{{ route('find.search') }}" method="POST">
    @csrf
    <table>
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">
          お名前
          </span>
        </th>
        <td class="form__group-content">
          <div class="form__group--name-item">
            <input type="text" name="fullname" value="{{ $fullname ?? '' }}">
          </div>
        </td>
      </tr>
      <tr class="form__group-gender">
        <th class="form__group-title">
          <span class="form__label--item">
          性別
          </span>
        </th>
        <td class="form__group-content">
          <div class="form__group-content-gender">
            <label class="gender" for="gender_all">
              <input class="radio" type="radio" name="gender" value="全て" {{ ($gender ?? '') === '全て' ? 'checked' : '' }} checked>全て
            </label>
            <label class="gender" for="gender_male">
              <input class="radio" type="radio" name="gender" value="男性" {{ ($gender ?? '') === '男性' ? 'checked' : '' }}>男性
            </label>
            <label class="gender" for="gender_female">
              <input class="radio" type="radio" name="gender" value="女性" {{ ($gender ?? '') === '女性' ? 'checked' : '' }}>女性
            </label>
          </div>
        </td>
      </tr>
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">
            登録日
          </span>
        </th>
        <td class="form__group-content">
          <div class="form__group--day-item">
            <input type="text" name="registration_date" value="{{ $registration_date ?? '' }}">
          </div>
        </td> 
      </tr>
      <tr class="form__group">
        <th class="form__group-title">
          <span class="form__label--item">
            メールアドレス
          </span>
        </th>
        <td class="form__group-content">
          <div class="form__input--email">
            <input class="email" type="text" name="email" value="{{ $email ?? '' }}">
          </div> 
        </td>
      </tr>  
    </table> 

  <div class="form__button">
    <button class="form__button-submit" type="submit">検索</button>
  </div>
  </form>
  <a class="reset-link" href="/find">リセット</a>
</div>
@if (isset($items) && $items->count() > 0)
<table class="result-table">
    <tr class="table-header">
      <th>ID</th>
      <th>名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
        
    </tr>
    @foreach ($items as $item)
    <tr class="table-row">
      <td>{{ $item->id }}</td>
      <td>{{ $item->fullname }}</td>
      <td>{{ $item->gender }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->opinion }}</td>
      <td>
          <form class="delete-form" action="{{ route('categories.delete', ['id' => $item->id]) }}" method="post">
              @method('DELETE')
              @csrf
              <input type="hidden" name="id" value="{{ $item->id }}">
              <button class="delete-button" type="submit">
                  削除
              </button>
          </form>
      </td>
    </tr>
    @endforeach
</table>
@else
<p>検索結果が見つかりません。</p>
@endif

@endsection