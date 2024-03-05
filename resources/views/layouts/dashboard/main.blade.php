<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Coffee | Dashboard</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/trix/trix.css">
    <link rel="stylesheet" type="text/css" href="/dist/pages/dashboard/css/dashboard.css">

    <script src="/assets/js/jquery/jquery.slim.min.js"></script>
    <script src="/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
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

    <script type="text/javascript" src="/assets/js/feather/feather.min.js"></script>
    <script type="text/javascript" src="/assets/js/trix/trix.js"></script>
    <script src="/dist/pages/dashboard/js/dashboard.js"></script>
</body>

</html>
