@extends('index')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/asset/tempusdominus/tempusdominus.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/asset/dataTable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/asset/dataTable/select.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/asset/dataTable/buttons.bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="col-6 col-md-8">
    <h1><span>Modul</span> Table</h1>
    <p>Hi {{ Auth::user()->name }}, this is modul table</p>
</div>
<div class="col-6 col-md-4 text-right">
    {{-- <div class="col-md-12">
      <a href="#" class="btn btn-light rounded-circle text-warning shadow mr-3"><i class="fas fa-user"></i></a>
      <a href="#" class="btn btn-light rounded-circle text-danger shadow"><i class="fas fa-sign-out-alt"></i></a>
    </div> --}}
    <div class="col-md-12">
        <a href="#" class="btn btn-light rounded-circle text-primary mt-2 shadow mr-3" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-plus"></i></a>
        <a href="#" class="btn btn-light rounded-circle text-success mt-2 shadow mr-3 disabled btn-edit" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-pencil-alt"></i></a>
        <a href="#" class="btn btn-light rounded-circle text-danger mt-2 shadow mr-3 disabled btn-delete" data-toggle="modal" data-target="#modalDelete"><i class="fas fa-trash"></i></a>
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
                  <th scope="col">Title</th>
                  <th scope="col">Desc</th>
                  <th scope="col">Type</th>
                  <th scope="col">Modul</th>
                  <th scope="col">Premium</th>
                  <th scope="col">Status</th>
              </tr>
          </thead>
      </table>
    </div>
  </div>
</div>
</div>

<div class="modal fade text-dark" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Add Modul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addForm" action="" method="post">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Title</span></label>
                                <input type="text" class="form-control" name="title" placeholder="Write a title" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Desc</span></label>
                                <textarea name="desc" class="form-control" placeholder="Desc..." rows="8" cols="80"></textarea>                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for=""><span class="font-weight-400">Type</span></label>
                                <select class="form-control" name="type" required>
                                    <option value="Flip pdf">Flip pdf</option>
                                    <option value="Video">Video</option>                                    
                                </select>
                                <img src="{{ asset('image/asset/flip-guide.png') }}" alt="" width="100%" class="mt-3 flip-guides">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span class="font-weight-400">File</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" required name="file">
                                    <input type="hidden" id="file" name="" value="">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="form-group">
                              <p class="text-dark font-weight-400">Premium</p>
                              <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="premium" name="premium" class="custom-control-input">
                                <label class="custom-control-label" for="premium">Premium</label>
                              </div>                             
                            </div>
                          </div>                                                                     
                        <div class="col-md-12">
                          <div class="form-group">
                            <p class="text-dark font-weight-400">Status</p>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="status1" name="status" value="On" class="custom-control-input" checked required>
                              <label class="custom-control-label" for="status1">On</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="status2" name="status" value="Off" class="custom-control-input" required>
                              <label class="custom-control-label" for="status2">Off</label>
                            </div>
                          </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary submit">Save changes</button>
            </div>
          </form>
        </div>
    </div>
</div>

<div class="modal fade text-dark" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Edit Modul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" action="" method="post">
              <input type="hidden" id="idEdit">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Title</span></label>
                                <input type="text" class="form-control" name="titleEdit" placeholder="Write a title" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Desc</span></label>
                                <textarea name="descEdit" class="form-control" placeholder="Desc..." rows="8" cols="80"></textarea>                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for=""><span class="font-weight-400">Type</span></label>
                                <select class="form-control" name="typeEdit" required>
                                    <option value="Flip pdf">Flip pdf</option>
                                    <option value="Video">Video</option>                                    
                                </select>
                                <img src="{{ asset('image/asset/flip-guide.png') }}" alt="" width="100%" class="mt-3 flip-guide">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span class="font-weight-400">File</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="filesEdit" name="fileEdit">
                                    <input type="hidden" name="" value="">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="form-group">
                              <p class="text-dark font-weight-400">Premium</p>
                              <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="premiumEdit" name="premiumEdit" class="custom-control-input">
                                <label class="custom-control-label" for="premiumEdit">Premium</label>
                              </div>                             
                            </div>
                          </div>                                               
                        <div class="col-md-12">
                          <div class="form-group">
                            <p class="text-dark font-weight-400">Status</p>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="status1Edit" name="statusEdit" value="On" class="custom-control-input" checked required>
                              <label class="custom-control-label" for="status1Edit">On</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="status2Edit" name="statusEdit" value="Off" class="custom-control-input" required>
                              <label class="custom-control-label" for="status2Edit">Off</label>
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


<div class="modal fade text-dark" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Delete modul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteForm" action="" method="post">
              <div id="idDelete">
              </div>
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

<div class="modal fade text-dark" id="modalPdf" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Modul</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <iframe id="content" class="iframe" src="" frameborder="0" id="content" width="100%" style="height:90vh"></iframe>
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary" onclick="GoInFullscreen('content')">Full screen <i class="fas fa-compress"></i></button>
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
        ajax: '{!! route('modul.create') !!}',
        columns: [
        { data: 'DT_RowIndex',name: 'DT_RowIndex' ,orderable: false,searchable: false, editable: true },
        { data: 'title', name: 'title' },
        { data: 'desc', name: 'desc' },
        { data: 'type', name: 'type' },
        { data: 'file', 
          name: 'file',
          render: function (data, type, row) {
            if(row['type'] == 'Flip pdf')
            {
              return "<button class='btn btn-primary' onClick='pdfClick(\"/modulss/extra/"+data+"/index.html\")'>File</button>";
            }
            return "<button class='btn btn-primary' onClick='pdfClick(\"/modulss/"+data+"\")'>File</button>";            
          }
        },
        { data: 'premium', name: 'premium' },        
        { data: 'status', name: 'status' },        
        // { data: 'photo',
        //   name: 'photo' ,
        //   render: function (data) {
        //     return "<img src=\"/" + data + "\" height=\"50\" alt='not loaded, reload the webpage' class='img-click' onClick='imageClick(\"/" + data + "\")'/>";
        //   }
        // },        
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

    $('[name=type]').on('change', (e) => {
        if($('[name=type] :selected').val() == 'Video'){
            $('.flip-guides').addClass('d-none')
        }else{
            $('.flip-guides').removeClass('d-none')
        }
    })

    $('[name=typeEdit]').on('change', (e) => {
        if($('[name=typeEdit] :selected').val() == 'Video'){
            $('.flip-guide').addClass('d-none')
        }else{
            $('.flip-guide').removeClass('d-none')
        }
    })

    $('#modalAdd').on('hide.bs.modal', function (e) {
      $('[name=title]').val('')
      $('[name=desc]').val('')
      $('[name=type]').val('Flip pdf')
      $('#flip-guide').removeClass('d-none')      
      $('#status1').prop('checked',true)
      $('.custom-file-label').text('Choose file')
      $('#file').val('');
      $('[name=premium]').prop('checked', false)
    })

    $('#modalEdit').on('hide.bs.modal', function (e) {
       $('.custom-file-label').text('Choose file')
       $('#filesEdit').val('');
      })

    $('.submit').on('click', (e) => {
    e.preventDefault()
    if($('#addForm').valid()){

      
     
      const property = document.getElementById("file").files[0];
      const file_name = property.name;
      const file_extension = file_name.split('.').pop().toLowerCase();
      const file_rename = `${makeid(40)}.${file_extension}`;
      const file_size = property.size;

      const data = {
          title: $('[name=title]').val(),
          desc: $('[name=desc]').val(),
          type: $('[name=type] :selected').val(),
          file: property,
          filename: file_rename,
          status: $('[name=status]:checked').val(),          
          premium: $('[name=premium]').prop('checked'),          
      }
      let extension =  ['mp4', 'mkv']
      let text = "Pease make sure video format is mp4 or mkv"
      
      if($('[name=type] :selected').val() == 'Flip pdf'){
         extension = ['zip']
         text = "Pease make sure file format is zip and zip structure folder same as image"
      }

      console.log(extension);
      
      if (jQuery.inArray(file_extension, extension) === -1) {
        swal({
          title: "Oh no maker!",
          text,
          icon: "error",
          button: "Ok!",
        });
      } else if (property.size > 53000000) {
        swal({
          title: "Oh no maker!",
          text: "Please make sure the size image lower than 50Mb",
          icon: "error",
          button: "Ok!",
        });
      } else {
          ajax('/modul', data, null, dataTable)
          $('#modalAdd').modal('hide')
      }
    }
    })

    $('.edit').on('click', (e) => {
        e.preventDefault()
        if ($('#editForm').valid()) {
          let data = {
              id: $('#idEdit').val(),
              title: $('[name=titleEdit]').val(),
              desc: $('[name=descEdit]').val(),
              type: $('[name=typeEdit] :selected').val(),
              file: null,
              filename: null,
              status: $('[name=statusEdit]:checked').val(),
              premium: $('[name=premiumEdit]').prop('checked'),
            }
          if ($('#filesEdit').val() == "") {            
            ajax('/modul/updated/', data, null, dataTable)
          }else {
            const property = document.getElementById("filesEdit").files[0];
            const image_name = property.name;
            const image_extension = image_name.split('.').pop().toLowerCase();
            const image_rename = `${makeid(40)}.${image_extension}`;
            const image_size = property.size;

            data.file = property
            data.filename = image_rename

            let extension =  ['mp4', 'mkv']
            let text = "Pease make sure video format is mp4 or mkv"
            
            if($('[name=typeEdit] :selected').val() == 'Flip pdf'){
              extension = ['zip']
              text = "Pease make sure file format is zip and zip structure folder same as image"
            }

            if (jQuery.inArray(image_extension, extension) === -1) {
              swal({
                title: "Oh no maker!",
                text,
                icon: "error",
                button: "Ok!",
              });
            } else if (property.size > 52000000) {
              swal({
                title: "Oh no maker!",
                text: "Please make sure the size image lower than 50Mb",
                icon: "error",
                button: "Ok!",
              });
            } else {
                ajax('/modul/updated/', data, null, dataTable)
            }
          }
          $('#modalEdit').modal('hide')
          $('.btn-edit').addClass('disabled')
          $('.btn-delete').addClass('disabled')
        }        
      })

    $('.delete').on('click', (e) => {
      e.preventDefault()
      let id = new Array()
      $('#idDelete input').each(function (i) {
        id[i] = $(this).attr('name')
      })
      const ids = {
        'id': id,
        'photo': null
      }
      ajax('/modul/'+id[0], ids, 'PUT', dataTable)
      $('#modalDelete').modal('hide')
      $('.btn-edit').addClass('disabled')
      $('.btn-delete').addClass('disabled')
    })



      dataTable
         .on('select', function ( e, dt, type, indexes ) {
             $('.btn-edit').removeClass('disabled')
             $('.btn-delete').removeClass('disabled')
             var rowData = dataTable.rows( indexes ).data().toArray();
             $('[name=titleEdit]').val(rowData[0].title)
             $('[name=descEdit]').val(rowData[0].desc)
             $('[name=typeEdit]').val(rowData[0].type)
             if(rowData[0].type == 'Video'){
              $('.flip-guide').addClass('d-none')               
             }else{
              $('.flip-guide').removeClass('d-none')
             }
             $('#idEdit').val(rowData[0].id)
             $('#idDelete').append('<input type="hidden" name="'+rowData[0].id+'">')
             $('#idDelete').html('')
             for (var i = 0; i < rowData.length; i++) {
               $('#idDelete').append('<input type="hidden" name="'+rowData[i].id+'">')
             }
             if (rowData[0].gender === 'Male') {
                $('#genderEdit1').prop('checked', true)
             }else {
                $('#genderEdit2').prop('checked', true)
             }
             if (rowData[0].status === 'On') {
                $('#status1Edit').prop('checked', true)
             }else {
                $('#status2Edit').prop('checked', true)
             }

             if (rowData[0].premium == 'true') {
              $('[name=premiumEdit]').prop('checked', true)
             }
         } )
         .on('deselect', function ( e, dt, type, indexes ) {
           $('.btn-edit').addClass('disabled')
           $('.btn-delete').addClass('disabled')
           $('#idDelete').html('')
         } );

      $('.dataTable').on('page.dt',function () {
          $('.btn-edit').addClass('disabled')
          $('.btn-delete').addClass('disabled')
     })

    })
</script>
@endpush
