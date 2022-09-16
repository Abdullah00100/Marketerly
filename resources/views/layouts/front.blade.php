<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="admin/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('title')</title>



    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet" />

</head>

<body>


    <div class="content">

        @yield('content')

    </div>


    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
    <script>
        swal("{{session('status')}}")
    </script>
    @endif

    @yield('scripts')

</body>




</html>