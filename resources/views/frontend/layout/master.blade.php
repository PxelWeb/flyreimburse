<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flyreimburse</title>
    <link rel="shortcut icon" href="{{ asset('areimburse logo-2.jpg') }}">
    <link rel="stylesheet" href="{{asset('frontend/footer.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/menu.css') }}">
    @yield('assets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
</head>
<body>
@include('frontend.layout.menu')

@yield('content')

<a class="whats-app" href="https://wa.me/+355693010777" target="_blank">
    <i class="fa-brands fa-whatsapp my-float"></i>
</a>

@include('frontend.layout.footer')



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
@include('frontend.layout.scripts')
@stack('scripts')
</body>
</html>
