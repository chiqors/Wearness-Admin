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
                <label for="">Title</label>
                <input type="text" placeholder="title" name="title" class="form-control" required value="{{ $home->title }}">
            </div>         
            <div class="form-group">
                <label for="">Sub title</label>
                <input type="text" placeholder="title" name="sub" class="form-control" required value="{{ $home->sub }}">
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
              title: $('[name=title]').val(),
              sub: $('[name=sub]').val(),              
              photo: null,
              photoname: null,           
            }
            ajax('/frontend/home', data, null)
        }
        $('#modalEdit').modal('hide')
        $('.btn-edit').addClass('disabled')
        $('.btn-delete').addClass('disabled')
      })
    })
</script>
@endpush
