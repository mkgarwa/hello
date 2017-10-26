<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>{{ config('app.name', 'REDCumin') }}</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="/vendor/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="/vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="/vendor/switchery/switchery.min.css"/>

    <!-- App styles -->
    <link rel="stylesheet" href="/styles/pe-icons/pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="/styles/pe-icons/helper.css"/>
    <link rel="stylesheet" href="/styles/stroke-icons/style.css"/>
    <link rel="stylesheet" href="/styles/style.css">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="blank">

<!-- Wrapper-->
<div class="wrapper">
    <section class="content">
        <div class="container-center animated slideInDown">
            @yield('content')
        </div>
    </section>
</div>
<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="/vendor/pacejs/pace.min.js"></script>
<script src="/vendor/jquery/dist/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/switchery/switchery.min.js"></script>

<!-- App scripts -->
<script src="/scripts/luna.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function(){
            $('[autocomplete=off]').val('');
        }, 15);
        new Switchery(document.querySelector('.js-switch'), { color: '#f6a821', size: 'small'});
    });
</script>
</body>

</html>
