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
            <input class=name type="text" name="lastname" value="{{ $confirm['lastname'] }}" readonly />
            <input type="text" class=name name="firstname" value="{{ $confirm['firstname'] }}" readonly />
          </td>
        </tr>

        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            @if ($confirm['gender'] == '1')
            <input type="hidden" name="gender" value="{{ $confirm['gender']}}"/>
            <p>男性</p>
            @elseif($confirm['gender'] == '2')
            <input type="hidden" name="gender" value="{{ $confirm['gender']}}"/>
            <p>女性</p>
            @elseif($confirm['gender'] == '3')
            <input type="hidden" name="gender" value="{{ $confirm['gender']}}" />
            <p>その他</p>
            @endif
          </td>
        </tr>

        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $confirm['email'] }}" readonly />
          </td>
        </tr>

        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="tel" class=tel name="firsttel" value="{{ $confirm['firsttel']}}" readonly />
            <input type="tel" class=tel name="middletel" value="{{ $confirm['middletel']}}" readonly />
            <input type="tel" class=tel name="lasttel" value="{{ $confirm['lasttel']}}" readonly />
          </td>
        </tr>

        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $confirm['address']}}" readonly />
          </td>
        </tr>

        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $confirm['building']}}" readonly />
          </td>
        </tr>

        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせの種類</th>
          <td class="confirm-table__text">
            <input type="hidden" name="category_id" value="{{$confirm['inquiry']}}" readonly />
            @foreach ($categories as $category)
            @if ($category['id'] == $confirm['inquiry'])
            <p>{{$category['content']}}</p>
            @endif
            @endforeach
          </td>
        </tr>

        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text confirm-table__text">
            <input type="text" class="detail" name="detail" value="{{ $confirm['detail']}}" readonly />
          </td>
        </tr>
      </table>
    </div>

    <div class="form__button">
      <button type="submit" class="submit" name="action" value="submit">送信</button>
      <button type="submit" class="back" name="action" value="back">修正</button>
    </div>
  </form>
</div>
@endsection