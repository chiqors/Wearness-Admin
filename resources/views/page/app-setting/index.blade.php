@extends('index')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/asset/tempusdominus/tempusdominus.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/asset/dataTable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/asset/dataTable/select.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/asset/dataTable/buttons.bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="col-6 col-md-8">
    <h1><span>App setting</span> Table</h1>
    <p>Hi {{ Auth::user()->name }}, this is app setting table</p>
</div>
<div class="col-6 col-md-4 text-right">    
    <div class="col-md-12">        
        <a href="#" class="btn btn-light rounded-circle text-success mt-2 shadow mr-3 disabled btn-edit" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-pencil-alt"></i></a>        
    </div>
</div>
@endsection

@section('content')

<div class="col-md-12 p-3 rounded">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-sm table-light table-striped dataTable">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Tagline</th>
                  <th scope="col">Logo</th>                  
              </tr>
          </thead>
      </table>
    </div>
  </div>
</div>
</div>


<div class="modal fade text-dark" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" action="" method="post">
              <input type="hidden" id="idEdit" name="" value="">
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for=""><span class="font-weight-400">Name</span></label>
                          <input type="text" class="form-control" name="name" placeholder="Write a name" required>
                      </div>
                  </div>                 
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for=""><span class="font-weight-400">Tagline</span></label>
                          <input type="text" class="form-control" name="tagline" placeholder="Write a tagline" required>
                      </div>
                  </div>                                   
                  <div class="col-md-12">
                      <label for=""><span class="font-weight-400">Photo</span></label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">Upload</span>
                          </div>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="fileEdit" name="photoEdit">
                              <input type="hidden" id="imageEdit" name="" value="">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                          </div>
                      </div>
                  </div>                  
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary edit">Save changes</button>
            </div>
          </form>
        </div>
    </div>
</div>


<div class="modal fade text-dark" id="modalImage" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="imgModal" alt="" width="100%">
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

<script src="{{ asset('/js/asset/dataTable/dataTable.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/dataTable/dataTables.bootstrap4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/dataTable/dataTables.select.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/dataTable/dataTables.buttons.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/dataTable/buttons.bootstrap4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/dataTable/pdfmake.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/dataTable/vfs_fonts.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/dataTable/buttons.html5.min.js') }}" charset="utf-8"></script>

<script src="{{ asset('/js/asset/jqueryValidate/jquery.validate.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/jqueryValidate/additional-methods.min.js') }}" charset="utf-8"></script>

<script src="{{ asset('/js/asset/sweetAlert/sweetalert.min.js') }}" charset="utf-8"></script>

<script type="text/javascript">
    $(document).ready(function() {
      const dataTable = $('.dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('app-setting.create') !!}',
        columns: [
        { data: 'DT_RowIndex',name: 'DT_RowIndex' ,orderable: false,searchable: false, editable: true },
        { data: 'name', name: 'name' },
        { data: 'tagline', name: 'tagline' },        
        { data: 'logo',
          name: 'logo' ,
          render: function (data) {
            if(data === null){
              return "<img src=\"/image/asset/default-user.png\" height=\"50\" alt='not loaded, reload the webpage' class='img-click' onClick='imageClick(\"/image/asset/default-user.png\")'/>";
            }else{
              return "<img src=\"/" + data + "\" height=\"50\" alt='not loaded, reload the webpage' class='img-click' onClick='imageClick(\"/" + data + "\")'/>";
            }            
          }
        },        
        ],
        select: true,
         dom: "<'row'<'col-sm-12 col-md-4'B><'col-sm-12 col-md-2'l><'col-sm-12 col-md-6'f>>"
               +'rt'+
               "<'row'<'col-sm-12 col-md-4'i><'col-sm-12 col-md-2 mt-1'l><'col-sm-12 col-md-6'p>>",
         buttons: [
            {
                text: 'Select all',
                action: function () {
                    dataTable.rows().select();
                }
            },
            {
                text: 'Select none',
                action: function () {
                    dataTable.rows().deselect();
                }
            },
        ]
      });
   
    $('#modalEdit').on('hide.bs.modal', function (e) {
       $('.custom-file-label').text('Choose file')
       $('#fileEdit').val('');
      })
    

    $('.edit').on('click', (e) => {
        e.preventDefault()
        if ($('#editForm').valid()) {
          let data = {
              id: $('#idEdit').val(),
              name: $('[name=name]').val(),
              tagline: $('[name=tagline]').val(),              
              photo: null,
              photoname: null,           
            }
          if ($('#fileEdit').val() == "") {            
            ajax('/app-setting', data, null, dataTable)
          }else {
            const property = document.getElementById("fileEdit").files[0];
            const image_name = property.name;
            const image_extension = image_name.split('.').pop().toLowerCase();
            const image_rename = `${makeid(40)}.${image_extension}`;
            const image_size = property.size;            

            data.photo = property
            data.photoname = image_rename

            if (jQuery.inArray(image_extension, ['gif', 'png', 'jpeg', 'jpg']) === -1) {
              swal({
                title: "Oh no maker!",
                text: "Please make sure image format is gif, png, or jpg",
                icon: "error",
                button: "Ok!",
              });
            } else if (property.size > 2000000) {
              swal({
                title: "Oh no maker!",
                text: "Please make sure the size image lower than 2Mb",
                icon: "error",
                button: "Ok!",
              });
            } else {
                ajax('/app-setting', data, null, dataTable)
            }
          }
        }
        $('#modalEdit').modal('hide')
        $('.btn-edit').addClass('disabled')
        $('.btn-delete').addClass('disabled')
        dataTable.rows().deselect();
      })

      dataTable
         .on('select', function ( e, dt, type, indexes ) {
             $('.btn-edit').removeClass('disabled')             
             var rowData = dataTable.rows( indexes ).data().toArray();
             $('[name=name]').val(rowData[0].name),             
             $('[name=tagline]').val(rowData[0].tagline),
             $('#idEdit').val(rowData[0].id)
         } )
         .on('deselect', function ( e, dt, type, indexes ) {
           $('.btn-edit').addClass('disabled')           
         } );

      $('.dataTable').on('page.dt',function () {
          $('.btn-edit').addClass('disabled')          
     })

    })
</script>
@endpush
