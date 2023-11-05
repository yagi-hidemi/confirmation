@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')

    <form action="/",method="post">
      @csrf
      <div class="thanks__content">
        <div class="thanks__heading">
          <p>ご意見いただきありがとうございました。</p>
        </div>
      </div>
      <div class="form-button">
        <button class="form-button-item" type="submit">トップページへ</button>
      </div>
    </form>
  @endsection