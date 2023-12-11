@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

<div class="admin">
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
        <td class="admin-table__content">{{ $contact['lastname'] }} {{ $contact['firstname'] }}</td>
        <td class="admin-table__content">{{ $contact['gender'] }}</td>
        <td class="admin-table__content">{{ $contact['email'] }}</td>   
        <td class="admin-table__content">{{ $contact['inquiry'] }}</td>
        <td class="update-form__content">
          <a href="#modal-01">詳細</a>

          <div class="modal-wrapper" id="modal-01">
            <a href="#!" class="modal-overlay"></a>
            <div class="modal-window">
              <table class="modal-table__inner">
                <tr class="modal-table__row">
                  <th class="modal-table__header">お名前</th>
                  <th class="modal-table__header">性別</th>
                  <th class="modal-table__header">メールアドレス</th>
                  <th class="modal-table__header">電話番号</th>
                  <th class="modal-table__header">住所</th>
                  <th class="modal-table__header">建物名</th>
                  <th class="modal-table__header">お問い合わせの種類</th>
                  <th class="modal-table__header">お問い合わせ内容</th>
                </tr>
                <tr class="modal-table__main">
                  <td class="modal-table__content">{{ $contact['lastname'] }} {{ $contact['firstname'] }}</td>
                  <td class="modal-table__content">{{ $contact['gender'] }}</td>
                  <td class="modal-table__content">{{ $contact['email'] }}</td>   
                  <td class="modal-table__content">{{ $contact['tel'] }}</td>
                  <td class="modal-table__content">{{ $contact['address'] }}</td>
                  <td class="modal-table__content">{{ $contact['building'] }}</td>
                  <td class="modal-table__content">{{ $contact['inquiry'] }}</td>
                  <td class="modal-table__content">{{ $contact['detail'] }}</td>
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

    
            <div class="delete-form__button">
              <button class="delete-form__button-submit" type="submit">リセット</button>
            </div>
          </form>
         
  </div>
</div>
@endsection