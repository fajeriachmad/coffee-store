<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coffee | Dashboard</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/trix/trix.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/datatables/dataTables.css">
    <link rel="stylesheet" type="text/css" href="/dist/pages/dashboard/css/dashboard.css">
</head>

<body>
    @include('partials.dashboard.header')

    <div class="container-fluid">
        <div class="row">
            @include('partials.dashboard.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                @yield('section')
            </main>
        </div>
    </div>

    <script type="text/javascript" src="/assets/js/jquery/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/assets/js/feather/feather.min.js"></script>
    <script type="text/javascript" src="/assets/js/trix/trix.js"></script>
    <script type="text/javascript" src="/assets/js/swal/Sweetalert2.js"></script>
    <script type="text/javascript" src="/assets/js/datatables/dataTables.js"></script>
    <script type="text/javascript" src="/dist/pages/dashboard/js/dashboard.js"></script>
    @yield('scripts')
</body>

</html>
