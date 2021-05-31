<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Barang</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('includes.style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('includes.navbar')
        {{-- ganti side bar admin --}}
        @include('includes.admin.sidebar')
        @yield('content')
        @include('includes.footer')
    </div>
    <!-- ./wrapper -->
    @include('includes.script')
</body>

</html>
