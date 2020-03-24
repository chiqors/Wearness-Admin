@extends('index')

@section('style')
    <link href="/css/asset/summernote/summernote.css" rel="stylesheet">  
    <style>
        .main-side--bg p{
            color: black
        }
    </style>
@endsection

@section('header')
<div class="col-6 col-md-8">
    <h1><span>Frontend </span> Home</h1>    
</div>
@endsection

@section('content')

<div class="col-md-12 p-3 rounded">
    <div class="card text-dark">    
    <div class="card-body">        
        <form method="POST" enctype="multipart/form-data" id="editForm">            
            <div class="form-group">
                <label for="">Phone number</label>
                <input type="text" placeholder="phone number" name="phone_number" class="form-control" required value="{{ $contact->phone_number }}">
            </div>         
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" placeholder="email" name="email" class="form-control" required value="{{ $contact->email }}">
            </div>         
            <div class="form-group">
                <label for="">Facebook</label>
                <input type="text" placeholder="Facebook" name="facebook" class="form-control" required value="{{ $contact->facebook }}">
            </div>         
            <div class="form-group">
                <label for="">Instagram</label>
                <input type="text" placeholder="Instagram" name="instagram" class="form-control" required value="{{ $contact->instagram }}">
            </div>         
            <div class="form-group">
                <label for="">Twitter</label>
                <input type="text" placeholder="Twitter" name="twitter" class="form-control" required value="{{ $contact->instagram }}">
            </div>         
            <div class="form-group">
                <label for="">Location</label>
                <input type="text" placeholder="location" name="location" class="form-control" required value="{{ $contact->location }}">
            </div>                     
            <button type="submit" class="btn btn-success btn-sm edit">Update</button>
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
<script src="{{ asset('/js/bin/popper.min.js') }}"></script>
<script src="{{ asset('/js/bin/bootsrap.min.js') }}"></script>
<script src="{{ asset('/js/bin/scroll.js') }}"></script>
<script src="{{ asset('/js/bin/custom.js') }}"></script>

<script src="{{ asset('/js/asset/jqueryValidate/jquery.validate.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/jqueryValidate/additional-methods.min.js') }}" charset="utf-8"></script>

<script src="{{ asset('/js/asset/sweetAlert/sweetalert.min.js') }}" charset="utf-8"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.edit').on('click', (e) => {
        e.preventDefault()
        if ($('#editForm').valid()) {
          let data = {
              phone_number: $('[name=phone_number]').val(),
              email: $('[name=email]').val(),                            
              location: $('[name=location]').val(),                                      
              facebook: $('[name=facebook]').val(),                                      
              instagram: $('[name=instagram]').val(),                                      
              twitter: $('[name=twitter]').val(),                                      
              photo: null,
              photoname: null,           
            }
            ajax('/frontend/contact', data, null)
        }
        $('#modalEdit').modal('hide')
        $('.btn-edit').addClass('disabled')
        $('.btn-delete').addClass('disabled')
      })
    })
</script>
@endpush
