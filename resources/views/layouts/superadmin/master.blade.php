<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Barang</title>
    <link rel="icon" href="{{ asset('image/hanil.png') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('includes.style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('includes.navbar')
        @if (Auth::user()->role == 'super_admin')
            @include('includes.superadmin.sidebar')
        @elseif (Auth::user()->role == 'admin')
            @include('includes.admin.sidebar')
        @elseif (Auth::user()->role == 'visitor')
            @include('includes.visitor.sidebar')
        @endif
        @yield('content')
        @include('includes.footer')
    </div>
    <!-- ./wrapper -->
    @include('includes.script')
</body>

</html>
