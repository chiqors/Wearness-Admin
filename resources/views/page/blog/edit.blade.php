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
    <h1><span>Blog</span> edit</h1>
    <p class="text-white">Hi {{ Auth::user()->name }}, this is blog edit</p>
</div>
@endsection

@section('content')

<div class="col-md-12 p-3 rounded">
    <div class="card text-dark">    
    <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success mt-3">
                <strong>{{ session()->get('success') }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/blog') }}" class="btn btn-primary float-right mb-3" >Back</a>
            </div>
        </div>
        <form action="{{route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" placeholder="title" name="title" class="form-control" required value="{{ $blog->title }}">
            </div>
            <div class="form-group">
                <label for="photo">Cover</label>
                <input type="file" class="form-control" name="cover" value="">
            </div>
            <div class="form-group">
                <textarea name="content" class="form-control summernote" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
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

<script src="{{ asset('/js/asset/summernote/summernote.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 500,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });;

        const content = {!! json_encode($blog->content) !!};

        $('.summernote').summernote('code', content);
    })
</script>
@endpush
