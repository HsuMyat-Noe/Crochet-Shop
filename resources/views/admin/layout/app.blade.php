<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($header_title) ? $header_title : ''}} | Snow Crochet</title>
  @include('admin.layout.link')
  @yield('style')
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.layout.header')
    @yield('content')  
    @include('admin.layout.footer')
</div>
@include('admin.layout.script')
@yield('script')
</body>
</html>
