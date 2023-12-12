@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header')
<form class="form" action="/logout" method="post">
  <button class="header-nav__button">logout</button>
</form>
@endsection

@section('content')
<div class="admin__content">
  <div class="admin__heading">
    <h2>Admin</h2>
  </div>
  <form class="search-form" action="/admin/search" method="get">
    @csrf
    <div class="search-form__item">
      <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">

      <select class="search-form__item-select" name="category_id">
        <option value="" hidden>お問い合わせの種類</option>
        @foreach ($categories as $category)
        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
        @endforeach
      </select>

    </div>
    <div class="search-form__button">
      <button class="search-form__button-submit" type="submit">検索</button>
    </div>
  </form>
{{ $contacts->links() }}

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
        <td class="admin-table__content">{{ $contact['gender'] }}</td>
        <td class="admin-table__content">{{ $contact['email'] }}</td>   
        <td class="admin-table__content">{{$categories[$contact['category_id']]['name']}}</td>
        <td class="update-form__content">
          <a href="#modal-01">詳細</a>
          <div class="modal-wrapper" id="modal-01">
            <a href="#!" class="modal-overlay"></a>
            <div class="modal-window">
              <table class="modal-table__inner">
                <tr class="modal-table__row">
                  <th class="modal-table__header">お名前</th>
                  <td class="modal-table__text">{{ $contact['lastname'] }} {{ $contact['firstname'] }}</td>
                </tr>

                <tr class="modal-table__row">
                  <th class="modal-table__header">性別</th>
                  <td class="modal-table__text">{{ $contact['gender'] }}</td>
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
                  <td class="modal-table__text">{{$categories[$contact['category_id']]['name']}}</td>   
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