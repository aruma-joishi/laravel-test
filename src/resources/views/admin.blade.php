@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header')
<form class="form" action="/logout" method="post">
  @csrf
  <button class="header-nav__button">logout</button>
</form>
@endsection

@section('content')
<div class="admin__content">
  <div class="admin__heading">
    <h2>Admin</h2>
  </div>
  <div class="search-form__item">
    <form class="search-form" action="/admin/search" method="get" id="search">
      @csrf
      <input class="search-form__item-input" type="text" name="keyword" value="{{request('keyword')}}">
      <button class="search-form__button-submit" type="submit"></button>
    </form>

    <select class="search-form__item-select" form="search" name="category_id">
      <option value="" hidden>お問い合わせの種類</option>
      <option value="">全て</option>
      @foreach ($categories as $category)
      <option value="{{ $category['id'] }}" @if( request('category_id')==$category['id'] ) selected @endif>{{ $category['content'] }}</option>
      @endforeach
    </select>

    <select class="search-form__item-select" form="search" name="gender">
      <option value="" hidden>性別</option>
      <option value="0" @if( request('gender')=='0' ) selected @endif>全て</option>
      <option value="1" @if( request('gender')=='1' ) selected @endif>男性</option>
      <option value="2" @if( request('gender')=='2' ) selected @endif>女性</option>
      <option value="3" @if( request('gender')=='3' ) selected @endif>その他</option>
    </select>

    <input class="search-form__item-select" type="date" form="search" name="date" value="{{request('date')}}">
  </div>

  <div class="search-form__bottom">
    <form class="csv-download" action="/admin/export" method="get">
      <div class="download__button">
        <button class="download__button-submit" type="submit">エクスポート</button>
        <input type="hidden" @if($queryParameters !=null) value="{{$queryParameters['keyword']}}" @endif name="keyword">
        <input type="hidden" @if($queryParameters !=null) value="{{$queryParameters['category_id']}}" @endif name="category_id">
        <input type="hidden" @if($queryParameters !=null) value="{{$queryParameters['gender']}}" @endif name="gender">
        <input type="hidden" @if($queryParameters !=null) value="{{$queryParameters['date']}}" @endif name="date">
        @foreach ($contacts as $contact)
        <input type="hidden" name="lastname" value="{{ $contact['lastname']}}">
        <input type="hidden" name="firstname" value="{{ $contact['firstname']}}">
        <input type="hidden" name="category_id" value="{{ $contact['category_id']}}">
        <input type="hidden" name="gender" value="{{ $contact['gender']}}">
        <input type="hidden" name="email" value="{{ $contact['email']}}">
        <input type="hidden" name="tel" value="{{ $contact['tel']}}">
        <input type="hidden" name="detail" value="{{ $contact['detail']}}">
        <input type="hidden" name="address" value="{{ $contact['address']}}">
        @endforeach
      </div>
    </form>
    {{ $contacts->appends(request()->query())->links() }}
  </div>

  <div class="admin-table">
    <table class="admin-table__inner">
      <tr class="admin-table__row">
        <th class="admin-table__header">お名前</th>
        <th class="admin-table__header">性別</th>
        <th class="admin-table__header">メールアドレス</th>
        <th class="admin-table__header">お問い合わせの種類</th>
        <th class="admin-table__header"></th>
      </tr>

      @foreach ($contacts as $contact)
      <tr class="admin-table__main">
        <td class="admin-table__content">{{ $contact['lastname']}} {{ $contact['firstname'] }}</td>
        @if ($contact['gender'] == '1')
        <td class="admin-table__content">男性</td>
        @elseif($contact['gender'] == '2')
        <td class="admin-table__content">女性</td>
        @elseif($contact['gender'] == '3')
        <td class="admin-table__content">女性</td>
        @endif
        <td class="admin-table__content">{{ $contact['email'] }}</td>
        @foreach ($categories as $category)
        @if ($category['id'] == $contact['category_id'])
        <td class="admin-table__content">{{$category['content']}}</td>
        @endif
        @endforeach
        <td class="update-form__content">
          <a href="#modal-{{$contact['id']}}">詳細</a>
          <div class="modal-wrapper" id="modal-{{$contact['id']}}">
            <a href="#!" class="modal-overlay"></a>
            <div class="modal-window">
              <table class="modal-table__inner">
                <tr class="modal-table__row">
                  <th class="modal-table__header">お名前</th>
                  <td class="modal-table__text">{{ $contact['lastname'] }} {{ $contact['firstname'] }}</td>
                </tr>

                <tr class="modal-table__row">
                  <th class="modal-table__header">性別</th>
                  @if ($contact['gender'] == '1')
                  <td class="modal-table__text">男性</td>
                  @elseif($contact['gender'] == '2')
                  <td class="modal-table__text">女性</td>
                  @elseif($contact['gender'] == '3')
                  <td class="modal-table__text">女性</td>
                  @endif
                </tr>

                <tr class="modal-table__row">
                  <th class="modal-table__header">メールアドレス</th>
                  <td class="modal-table__text">{{ $contact['email'] }}</td>
                </tr>

                <tr class="modal-table__row">
                  <th class="modal-table__header">電話番号</th>
                  <td class="modal-table__text">{{ $contact['tel'] }}</td>
                </tr>

                <tr class="modal-table__row">
                  <th class="modal-table__header">住所</th>
                  <td class="modal-table__text">{{ $contact['address'] }}</td>
                </tr>

                <tr class="modal-table__row">
                  <th class="modal-table__header">建物名</th>
                  <td class="modal-table__text">{{ $contact['building'] }}</td>
                </tr>

                <tr class="modal-table__row">
                  <th class="modal-table__header">お問い合わせの種類</th>
                  @foreach ($categories as $category)
                  @if ($category['id'] == $contact['category_id'])
                  <td class="modal-table__text">{{$category['content']}}</td>
                  @endif
                  @endforeach
                </tr>

                <tr class="modal-table__row">
                  <th class="modal-table__header">お問い合わせ内容</th>
                  <td class="modal-table__text">{{ $contact['detail'] }}</td>
                </tr>
              </table>

              <form class="delete-form" action="/admin/delete" method="POST">
                @method('DELETE')
                @csrf
                <div class="delete-form__button">
                  <input type="hidden" name="id" value="{{ $contact['id'] }}">
                  <button class="delete-form__button-submit" type="submit">削除</button>
                </div>
              </form>

              <a href="#!" class="modal-close">×</a>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </table>
  </div>

  <form class="reset-form" action="/admin" method="get">
    <button class="reset-form__button-submit" type="submit">リセット</button>
  </form>
</div>
@endsection
</div>