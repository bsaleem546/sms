<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('public/assets/images/favicon.png') }}">

    <title>@yield('title') - School Management System</title>

    <!-- page css -->
    <link href="{{ url('public/css/pages/login-register-lock.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url('public/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/css/my-styles.css') }}" rel="stylesheet">
    <!-- Sweetalert -->
    <link href="{{ url('public/assets/node_modules/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

</head>
<body>

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>

<section id="wrapper" class="login-register login-sidebar"
         style="background-image:url({{ url('public/assets/images/background/login-bg.jpg') }} );">
    <div class="login-box card">
        <div class="card-body">
            @yield('content')
        </div>
    </div>
</section>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ url('public/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('public/assets/node_modules/popper/popper.min.js') }}"></script>
<script src="{{ url('public/assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/assets/node_modules/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ url('public/js/ajax.js') }}"></script>
<!--Custom JavaScript -->
<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $('#to-recover').on("click", function() {
        $("#login").slideUp();
        $("#recoverform").fadeIn();
    });
</script>
</body>
</html>
