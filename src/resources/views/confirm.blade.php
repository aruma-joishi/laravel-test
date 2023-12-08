@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
  <div class="confirm__content">
    <div class="confirm__heading">
      <h2>Confirm</h2>
    </div>
    <form class="form" action="/contacts" method="post">
      @csrf
      <div class="confirm-table">
        <table class="confirm-table__inner">

          <tr class="confirm-table__row">
            <th class="confirm-table__header">お名前</th>
            <td class="confirm-table__text">
                <input type="text" name="lastname" value="{{ $confirm['lastname'] }}" readonly/>
                <input type="text" name="firstname" value="{{ $confirm['firstname'] }}" readonly/>
            </td>
          </tr>
          
          <tr class="confirm-table__row">
            <th class="confirm-table__header">性別</th>
            <td class="confirm-table__text">
              <input type="text" name="gender" value="{{ $confirm['gender']}}" readonly/>
            </td>
          </tr>

          <tr class="confirm-table__row">
            <th class="confirm-table__header">メールアドレス</th>
            <td class="confirm-table__text">
              <input type="email" name="email" value="{{ $confirm['email'] }}" readonly/>
            </td>
          </tr>

          <tr class="confirm-table__row">
            <th class="confirm-table__header">電話番号</th>
            <td class="confirm-table__text">
              <input type="tel" name="firsttel" value="{{ $confirm['firsttel']}}" readonly/>
              <input type="tel" name="middletel" value="{{ $confirm['middletel']}}" readonly/>
              <input type="tel" name="lasttel" value="{{ $confirm['lasttel']}}" readonly/>
            </td>
          </tr>

          <tr class="confirm-table__row">
            <th class="confirm-table__header">住所</th>
            <td class="confirm-table__text">
              <input type="text" name="address" value="{{ $confirm['address']}}" readonly/>
            </td>
          </tr>

          <tr class="confirm-table__row">
            <th class="confirm-table__header">建物名</th>
            <td class="confirm-table__text">
              <input type="text" name="building" value="{{ $confirm['building']}}" readonly/>
            </td>
          </tr>

          <tr class="confirm-table__row">
            <th class="confirm-table__header">お問い合わせの種類</th>
            <td class="confirm-table__text">
              <input type="text" name="inquiry" value="{{ $confirm['inquiry']}}" readonly/>
            </td>
          </tr>
          
          <tr class="confirm-table__row">
            <th class="confirm-table__header">お問い合わせ内容</th>
            <td class="confirm-table__text">
              <input type="text" name="detail" value="{{ $confirm['detail']}}" readonly/>
            </td>
          </tr>
        </table>
      </div>

      <div class="form__button">
        <button type="submit" name="action" value="submit">送信</button>
        <button type="submit" name="action" value="back">修正</button>
      </div>
    </form> 
  </div>
@endsection