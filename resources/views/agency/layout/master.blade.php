<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Fly Reimburse</title>
    <link rel="shortcut icon" href="{{ asset('areimburse logo-1.jpg') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('backend/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('backend/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/weather-icon/css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap-iconpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/components.css')}}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('agency.layout.navbar')
        @include('agency.layout.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; Fly Reimburse 2024  <div class="bullet"></div> Developed By Vilson Murrja
            </div>
            <div class="footer-right">

            </div>
        </footer>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- General JS Scripts -->
<script src="{{asset('backend/assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/popper.js')}}"></script>
<script src="{{asset('backend/assets/modules/tooltip.js')}}"></script>
<script src="{{asset('backend/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('backend/assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="{{asset('backend/assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/chart.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('backend/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
<script src="{{asset('backend/assets/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('backend/assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src='https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<!-- Page Specific JS File -->
<script src="{{asset('backend/assets/js/page/index-0.js')}}"></script>

<!-- Template JS File -->
<script src="{{asset('backend/assets/js/scripts.js')}}"></script>
<script src="{{asset('backend/assets/js/custom.js')}}"></script>

<script>
    @if($errors->any())
         @foreach($errors->all() as $error)
             toastr.error('{{$error}}')
         @endforeach
    @endif
</script>

@stack('scripts')

</body>
</html>
