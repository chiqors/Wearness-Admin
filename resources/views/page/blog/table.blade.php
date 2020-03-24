@extends('index')

@section('header')
<div class="col-6 col-md-8">
    <h1><span>Blog</span> list</h1>
    <p>Hi {{ Auth::user()->name }}, this is blog list</p>
</div>
<div class="col-6 col-md-4 text-right">    
    <div class="col-md-12">        
        <a href="{{ url('blog/create') }}" class="btn btn-light rounded-circle text-primary mt-2 shadow mr-3"><i class="fas fa-plus"></i></a>
    </div>
</div>
@endsection

@section('content')

@if (count($blog) == 0)
<div class="col-md-12 p-3 rounded">
    <div class="card text-dark">    
    <div class="card-body">
        <h5 class="card-title alert alert-warning">Blog empty</h5>       
    </div>
    </div>
</div>
@else 
@foreach ($blog as $key => $value)    
<div class="col-md-4 p-3 rounded">
    <div class="card text-dark" style="width: 18rem;">
    <div style="background-image: url('/{{ $value->cover }}');width:100%;height: 200px;background-size:contain;background-repeat: no-repeat;background-position: center center;"></div>
    <div class="card-body">
        <h5 class="card-title">{{ $value->title }}</h5>
        <p class="text-dark">
            <i class="fas fa-user mr-1"></i>
            <span>{{ $value->user->name }}</span>
        </p>
        <p class="text-dark">
            <i class="fas fa-table mr-1"></i>
            <span>{{ $value->created_at->format('D d M y') }}</span>
        </p>        
        <a href="{{ url($dev->url1.'blog/'.$value->id) }}" class="btn btn-light rounded-circle text-primary mt-2 shadow mr-3 btn-edit">
            <i class="fas fa-eye"></i>
        </a>
        <a href="{{ url('/blog/'.$value->id.'/edit') }}" class="btn btn-light rounded-circle text-success mt-2 shadow mr-3 btn-edit">
            <i class="fas fa-pencil-alt"></i>
        </a>
        <a href="#" class="btn btn-light rounded-circle text-danger mt-2 shadow mr-3 btn-delete" data-toggle="modal" data-target="#modalDelete" dataId="{{ $value->id }}">
            <i class="fas fa-trash"></i>
        </a>
    </div>
    </div>
</div>
@endforeach
@endif

</div>

<div class="modal fade text-dark" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Delete blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteForm" action="" method="post">
              <input type="hidden" name="" id="idDelete">
            <div class="modal-body">
                <div class="alert alert-danger">Are you sure? you cannot prevent back</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger delete">Delete</button>
            </div>
          </form>
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

<script src="{{ asset('/js/asset/sweetAlert/sweetalert.min.js') }}" charset="utf-8"></script>

<script type="text/javascript">
   $(document).ready(function() {        
        $('.btn-delete').on('click', (e) => {
            e.preventDefault()
            $('#idDelete').val(e.currentTarget.attributes.dataId.nodeValue)            
        })

      $('.delete').on('click', (e) => {
        e.preventDefault()
        const id = $('#idDelete').val()  
        const data = {
            id
        }      
        
        ajax('/blog/'+id, data, 'DELETE')        
        $('#modalDelete').modal('hide')
      })
    });
</script>
@endpush
