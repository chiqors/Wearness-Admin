@extends('index')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/asset/tempusdominus/tempusdominus.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/asset/dataTable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/asset/dataTable/select.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/asset/dataTable/buttons.bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="col-6 col-md-8">
    <h1><span>Setting</span> User</h1>
</div>
<div class="col-6 col-md-4 text-right">
    {{-- <div class="col-md-12">
      <a href="#" class="btn btn-light rounded-circle text-warning shadow mr-3"><i class="fas fa-user"></i></a>
      <a href="#" class="btn btn-light rounded-circle text-danger shadow"><i class="fas fa-sign-out-alt"></i></a>
    </div> --}}  
</div>
@endsection

@section('content')

<div class="col-md-12 p-3 rounded">
  <div class="card">
    <div class="card-body">
            @if (Session::has('success'))
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
        @endif
        <form action="{{ route('setting.store') }}" method="POST">
                @csrf          
        <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                <label class="text-dark" for="">Email</label>
                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"  value="{{ Auth::user()->email }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>              
            </div>
            <div class="col-md-12">            
            <div class="form-group">
                <label class="text-dark" for="">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>          
            </div>
              <button type="submit" class="btn btn-primary ml-3">Update</button>          
        </div>
          </form>               
          <hr>
          <p class="text-muted">Change password</p>     
        <form action="{{ route('setting.update', Auth::user()->id) }}" method="POST">
                @csrf          
                @method('PUT')
        <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                <label class="text-dark" for="">Current Password</label>
                <input type="password" name="password_now" class="form-control @error('password_now') is-invalid @enderror" required>
                @error('password_now')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>              
            </div>
            <div class="col-md-12">
            <div class="form-group">
                <label class="text-dark" for="">New Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>              
            </div>
            <div class="col-md-12">            
            <div class="form-group">
                <label class="text-dark" for="">Password Confrimation</label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>          
            </div>
              <button type="submit" class="btn btn-success ml-3">Change password</button>          
        </div>
          </form>                    
    </div>
  </div>
</div>
</div>
@endsection

<style>
label.error {
    color: red;
    position: absolute;
    right: 150px;
    bottom: 10px;
    z-index: 1000;
}
</style>

@push('script')
<script src="{{ asset('/js/bin/jquery.min.js') }}"></script>
<script src="{{ asset('js/bin/moment.js') }}"></script>
<script src="{{ asset('/js/bin/popper.min.js') }}"></script>
<script src="{{ asset('/js/bin/bootsrap.min.js') }}"></script>
<script src="{{ asset('js/bin/tempusdominus.min.js') }}"></script>
<script src="{{ asset('/js/bin/scroll.js') }}"></script>
<script src="{{ asset('/js/bin/custom.js') }}"></script>

<script src="{{ asset('/js/asset/jqueryValidate/jquery.validate.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/jqueryValidate/additional-methods.min.js') }}" charset="utf-8"></script>

<script src="{{ asset('/js/asset/sweetAlert/sweetalert.min.js') }}" charset="utf-8"></script>

<script type="text/javascript">    
        $('form').validate()
</script>
@endpush
