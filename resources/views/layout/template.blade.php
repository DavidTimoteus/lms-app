<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Learning Management System') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Mengirim token pada setiap request ajax -->
    <!-- Google Font: Source Sans Pro -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Inter';
        }

        body .bi:before,
        [class^=bi-]:before,
        [class*=" bi-"]:before {
            vertical-align: -.125em !important;
        }
    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="{{ asset('Mazer/dist/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('Mazer/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" crossorigin=""
        href="{{ asset('Mazer/dist/assets/compiled/css/table-datatable-jquery.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('Mazer/dist/assets/extensions/sweetalert2/sweetalert2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('Mazer/dist/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('Mazer/dist/assets/compiled/css/app-dark.css') }}">
    @stack('css'){{-- Digunakan untuk memanggil custom css dari perintah push('css') pada masing" view  --}}
</head>

<body class="light">
    <div id="app">
        <div id="main" class="layout-horizontal">
            <!-- Header -->
            @include('layout.header')
            <!-- Content Wrapper-->
            <div class="content-wrapper container">
                @if (Auth::check() && Auth::user()->level && in_array(Auth::user()->level->level_code, ['ADM', 'PGJ']))
                    @include('layout.breadcrumb')
                @endif
                <!-- Main content -->
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
            <!-- /.content-wrapper -->
            @include('layout.footer')
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>

    <!-- jQuery dari CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!-- DataTables & Plugins -->
    <script src="{{ asset('Mazer/dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Mazer/dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Mazer Template -->
    <script src="{{ asset('Mazer/dist/assets/static/js/pages/horizontal-layout.js') }}"></script>
    <script src="{{ asset('Mazer/dist/assets/static/js/initTheme.js') }}"></script>
    <script src="{{ asset('Mazer/dist/assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('Mazer/dist/assets/compiled/js/app.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @stack('js')
</body>

</html>
