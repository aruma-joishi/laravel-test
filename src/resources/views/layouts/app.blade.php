<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header-inner">
      <h2>FashionablyLate</h2>
    </div>
    @yield('header')
  </header>
  
  <main>
    @yield('content')
  </main>
</body>

</html>