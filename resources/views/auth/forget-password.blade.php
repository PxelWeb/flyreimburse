<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Forget Password</title>
    <link rel="shortcut icon" href="{{ asset('areimburse logo-1.jpg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('backend/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{assert('backend/assets/modules/bootstrap-social/bootstrap-social.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/components.css')}}">

    <style>
        body {
           background: url('{{ asset('fly-reimburse.webp') }}') no-repeat center center fixed;
           background-size: cover;
       }
   </style>
    <!-- /END GA --></head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ asset('areimburse login-logo-2.jpg') }}" alt="logo" class="shadow-light" style="width: 350px;">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><strong style="margin-left: 70px;">FORGET PASSWORD?</strong></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate="">
                                @csrf

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="float-right">
                                        <a href="{{route('login')}}" class="text-small">
                                            Return Back?
                                        </a>
                                    </div>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" placeholder="someone@example.com" required autofocus
                                    value="{{old('email')}}">
                                    @if($errors->has('email'))
                                        <code>{{$errors->first('email')}}</code>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Send
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="mt-5 text-muted text-center">
                        Don't have an account? <a href="auth-register.html">Create One</a>
                    </div> --}}
                    <div class="simple-footer">
                        Copyright &copy; Fly Reimburse 2024
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- General JS Scripts -->
<script src="{{asset('backend/assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/popper.js')}}"></script>
<script src="{{asset('backend/assets/modules/tooltip.js')}}"></script>
<script src="{{asset('backend/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('backend/assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{asset('backend/assets/js/scripts.js')}}"></script>
<script src="{{asset('backend/assets/js/custom.js')}}"></script>

<script>
    @if (session('status'))
            toastr.success("{{ session('status') }}");
        @endif
</script>
</body>
</html>
