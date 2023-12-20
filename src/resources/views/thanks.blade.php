@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks__content">
      <div class="thanks__heading">
        <h2>お問い合わせありがとうございました</h2>
      </div>
      <a class="thanks__link" href="{{url('/')}}">Home</a>
    </div>
@endsection