@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
  <div class="contact-form__content">
    <div class="contact-form__heading">
      <h2>Contact</h2>
    </div>
    <form class="form" action="/contacts/confirm" method="post">
      @csrf

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">お名前</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="lastname" placeholder="例：山田" value="{{ old('lastname') }}" />
            <input type="text" name="firstname" placeholder="例：太郎" value="{{ old('firstname') }}" />
          </div>
          <div class="form__error">
            @error('lastname')
              {{ $message }}
            @enderror
            @error('firstname')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">性別</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--radio">
            <input type="radio" id="male" name="gender" value="男性" {{ old ('gender') == '男性' ? 'checked' : '' }} checked/>
            <label for="male">男性</label>
            <input type="radio" id="female" name="gender" value="女性" {{ old ('gender') == '女性' ? 'checked' : '' }}/>
            <label for="female">女性</label>
            <input type="radio" id="other" name="gender" value="その他"{{ old ('gender') == 'その他' ? 'checked' : '' }}/>
            <label for="other">その他</label>
          </div>
          <div class="form__error">
            @error('gender')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
          </div>
          <div class="form__error">
            @error('email')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">電話番号</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="tel" name="firsttel" placeholder="080" value="{{ old('firsttel') }}" />
            <input type="tel" name="middletel" placeholder="1234" value="{{ old('middletel') }}" />
            <input type="tel" name="lasttel" placeholder="5678" value="{{ old('lasttel') }}" />
          </div>
          <div class="form__error">
            @error('firsttel')
              {{ $message }}
            @enderror
            @error('middletel')
              {{ $message }}
            @enderror
            @error('lasttel')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">住所</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
          </div>
          <div class="form__error">
            @error('address')
              {{ $message }}
            @enderror
          </div>
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">建物名</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="text" name="building" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('building') }}" />
          </div>
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">お問い合わせの種類</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <select name="inquiry" >
              <option value="" hidden>選択してください</option>
              <option value="1. 商品のお届けについて" @if( old('inquiry') == '1. 商品のお届けについて' ) selected @endif>1. 商品のお届けについて</option>
              <option value="2. 商品の交換について" @if( old('inquiry') === '2. 商品の交換について' ) selected @endif>2. 商品の交換について</option>
              <option value="3. 商品トラブル" @if( old('inquiry') == '3. 商品トラブル' ) selected @endif>3. 商品トラブル</option>
              <option value="4. ショップへのお問い合わせ"  @if( old('inquiry') == '4. ショップへのお問い合わせ' ) selected @endif>4. ショップへのお問い合わせ</option>
              <option value="5. その他"  @if( old('inquiry') == '5. その他' ) selected @endif>5. その他</option>
            </select>
          </div>
        </div>
        <div class="form__error">
          @error('inquiry')
            {{ $message }}
          @enderror
        </div>
      </div>

      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">お問い合わせ内容</span>
          <span class="form__label--required">※</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--textarea">
            <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" >{{ old('detail') }}</textarea>
          </div>
        </div>
        <div class="form__error">
          @error('detail')
            {{ $message }}
          @enderror
        </div>
      </div>


      <div class="form__button">
        <button class="form__button-submit" type="submit">確認画面</button>
      </div>    
    </form>
  </div>

@endsection