<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 1px;
        }
    </style>
    @yield('css')
</head>
<body>
<div>
    @include('layouts.header',['name'=>'bxx'])
</div>
<div>
    @yield('content')
</div>
<div>
    @include('layouts.footer')
</div>
@yield('script')
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
</html>