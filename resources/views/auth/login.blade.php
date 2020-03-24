@php
    use App\AppSetting;
    $app = AppSetting::first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="shortcut icon" type="image/png" href="/image/asset/favicon.png"/> --}}
    <title>{{ $app->name }} | Login</title>

    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/all.min.css') }}" >
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">        
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/frontend.css') }}">
</head>
<body>
    <div class="login">
        <div class="login-left">
            <img src="{{ $app->logo }}" alt="" class="mt-5 ml-5">
            <p class="mb-0 login-typography"><span>{{ $app->name }}</span> advances computer science education globally to drive knowledge, inovation, skills development, and diversity in</p>
            <p class="login-typography">technology fields.</p>
            <div class="login-bg">
                <img src="/image/asset/bg2.png" alt="">
            </div>
        </div>
        <div class="login-right">
            <form method="POST" action="{{ route('logins') }}">                        
                @csrf

                <img src="/image/asset/academy-logo.png" alt="" class="login-right--logo ml-auto mr-auto">
                <div class="form-group">
                    <label for="" class="ml-3 text-muted">Email</label>
                    <input type="email" name="email" class="form-control shadow @error('email') is-invalid @enderror" required>
                    <span class="icon">
                        <i class="fas fa-at"></i>
                    </span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-5">
                    <label for="" class="ml-3 text-muted">Password</label>
                    <input type="password" name="password" class="form-control shadow @error('password') is-invalid @enderror" required>
                    <span class="icon">
                        <i class="fas fa-lock"></i>
                    </span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-5 d-flex justify-content-between">
                    <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" id="remember" >
                            <label class="custom-control-label" for="customCheck1">Remember Me</label>
                    </div>        
                    {{-- <a href="{{ url('/password/reset') }}">Forgot password?</a> --}}
                </div>
                <div class="form-group mt-5 text-center">
                    <button type="submit" class="btn btn-bluedark w-75">Log in</button>
                    {{-- <p class="mt-3">Don't have an account ? <a href="{{ url('/register') }}">Register</a></p> --}}
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<script src="{{ asset('/js/bin/jquery.min.js') }}"></script>
<script src="{{ asset('/js/bin/popper.min.js') }}"></script>
<script src="{{ asset('/js/bin/bootsrap.min.js') }}"></script>

<script src="{{ asset('/js/asset/jqueryValidate/jquery.validate.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/jqueryValidate/additional-methods.min.js') }}" charset="utf-8"></script>

@if (session()->has('success'))
    <div class="modal fade show" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div  class="modal-content bg-primary text-white border-0">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Success</h5>              
            </div>
            <div class="modal-body">
                <h5>{{ session()->get('success') }}</h5>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        <script>
        $('#successModal').modal('show')
        </script>
@endif

@if (session()->has('warning'))
    <div class="modal fade show" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div  class="modal-content bg-warning text-white border-0">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Warning</h5>              
            </div>
            <div class="modal-body">
                <h5>{{ session()->get('warning') }}</h5>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-warning text-white" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        <script>
        $('#successModal').modal('show')
        </script>
@endif

@if (session()->has('errorss'))
    <div class="modal fade show" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div  class="modal-content bg-danger text-white border-0">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">Ops</h5>              
            </div>
            <div class="modal-body">
                <h5>{{ session()->get('errorss') }}</h5>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-danger text-white" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        <script>
        $('#successModal').modal('show')
        </script>
@endif

<script>
    $(document).ready(function() {
        $('form').validate()
    })
</script>