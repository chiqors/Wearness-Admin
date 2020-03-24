@extends('index')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/asset/tempusdominus/tempusdominus.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/asset/dataTable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/asset/dataTable/select.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/asset/dataTable/buttons.bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="col-6 col-md-8">
    <h1><span>Device</span> Table</h1>
    <p>Hi {{ Auth::user()->name }}, this is device table</p>
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
                  <th scope="col">Device name</th>
                  <th scope="col">Serial number</th>
                  <th scope="col">Version</th>
                  <th scope="col">Release year</th>
                  <th scope="col">Photo </th>
                  <th scope="col">Price </th>
                  <th scope="col">Status </th>
                  <th scope="col">User </th>
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
                <h5 class="modal-title" id="modalAddLabel">Add device</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addForm" action="" method="post">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Device name</span></label>
                                <input type="text" class="form-control" name="device_name" placeholder="Write a device name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Serial number</span></label>
                                <input type="text" class="form-control" name="serial_number" min="0" placeholder="Automatic" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Version</span></label>
                                <input type="number" class="form-control" name="version" min="0" placeholder="Write a version" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span class="font-weight-400">Release year</span></label>
                                  <div class="input-group date" data-target-input="nearest">
                                      <input type="text" class="form-control datetimepicker-input release_year" data-toggle="datetimepicker" data-target=".release_year" placeholder="Pick the release year" name="release_year" required/>
                                      <div class="input-group-append" data-target=".release_year" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span class="font-weight-400">Photo</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" required name="photo">
                                    <input type="hidden" id="image" name="" value="">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Price</span></label>
                                <input type="number" class="form-control" name="price" min="0" placeholder="Write a price of unit" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Input count</span></label>
                                <input type="number" class="form-control" value="1" min="1" max="1000" name="input_count" placeholder="How many input count" required>
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
                <h5 class="modal-title" id="modalEditLabel">Edit device</h5>
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
                                <label for=""><span class="font-weight-400">Device name</span></label>
                                <input type="text" class="form-control" name="device_nameEdit" placeholder="Write a device name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Serial number</span></label>
                                <input type="text" class="form-control" min="0" name="serial_numberEdit" placeholder="Automatic" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Version</span></label>
                                <input type="number" class="form-control" min="0" name="versionEdit" placeholder="Write a version" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span class="font-weight-400">Release year</span></label>
                                  <div class="input-group date" data-target-input="nearest">
                                      <input type="text" class="form-control datetimepicker-input release_yearEdit" data-toggle="datetimepicker" data-target=".release_yearEdit" placeholder="Pick the release year" name="release_yearEdit" required/>
                                      <div class="input-group-append" data-target=".release_yearEdit" data-toggle="datetimepicker">
                                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                      </div>
                                  </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span class="font-weight-400">Photo</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="fileEdit" name="photo">
                                    <input type="hidden" id="imageEdit" name="" value="">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <p class="text-danger">Current image (Ignore if not update)</p>
                            <img src="" alt="" id="currentImage" width="150px">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Price</span></label>
                                <input type="number" class="form-control" name="priceEdit" placeholder="Write a price of unit" required>
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
                <h5 class="modal-title" id="modalEditLabel">Delete device</h5>
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
<script src="{{ asset('/js/asset/dataTable/buttons.print.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/dataTable/jszip.min.js') }}" charset="utf-8"></script>

<script src="{{ asset('/js/asset/jqueryValidate/jquery.validate.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/jqueryValidate/additional-methods.min.js') }}" charset="utf-8"></script>

<script src="{{ asset('/js/asset/sweetAlert/sweetalert.min.js') }}" charset="utf-8"></script>

<script type="text/javascript">    
    $(document).ready(function() {
      const dataTable = $('.dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('device.create') !!}',
        columns: [
        { data: 'DT_RowIndex',name: 'DT_RowIndex' ,orderable: false,searchable: false, editable: true },
        { data: 'device_name', name: 'device_name' },
        { data: 'serial_number', name: 'serial_number' },
        { data: 'version', name: 'version' },
        { data: 'release_year', name: 'release_year' },
        { data: 'photo',
          name: 'photo' ,
          render: function (data) {
            return "<img src=\"/" + data + "\" height=\"50\" alt='not loaded, reload the webpage' class='img-click' onClick='imageClick(\"/" + data + "\")'/>";
          }
        },
        { data: 'price',
          name: 'price',
          render: function(data) {
            return 'Rp '+data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          }
        },
        { data: 'status', name: 'status',
            render:function (data, type, row){
              if (data == 'On stock') {
                return `<div class="alert alert-success">On stock</div>`
              }else if(data == 'On sold'){
                return `<div class="alert alert-warning">On sold</div>`
              }else{
                return `<div class="alert alert-danger">Active</div>`
              }
            }
         },
        { data: 'user_id', name: 'user_id',
          render: function(data, type, row){
            if(row.status == 'Delete'){
              return 'User deleted'
            }else if(data == null){
              return ''
            }else{
              return row.user.name
            }
          }
        },
        ],
        select: true,
         dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'f>>"
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
            {
              text:'Export Serial number',
              extend: 'excel',
              exportOptions: {
                    columns: [0,1, 2,3,4,6,7,8]
                }
            }
        ]
      });

      $('.release_year').datetimepicker({
        format: 'Y'
    });

      $('.release_yearEdit').datetimepicker({
        format: 'Y'
    });

    $('#modalAdd').on('hide.bs.modal', function (e) {
       $('[name=device_name]').val('')
       $('[name=version]').val('')
       $('[name=release_year]').val('')
       $('.custom-file-label').text('Choose file')
       $('[name=price]').val('')
       $('[name=input_count]').val('1')
       $('#file').val('');
      })

    $('#modalEdit').on('hide.bs.modal', function (e) {
       $('.custom-file-label').text('Choose file')
       $('#fileEdit').val('');
      })

    $('.submit').on('click', (e) => {
    e.preventDefault()
    if($('#addForm').valid()){
      const property = document.getElementById("file").files[0];
      const image_name = property.name;
      const image_extension = image_name.split('.').pop().toLowerCase();
      const image_rename = `${makeid(40)}.${image_extension}`;
      const image_size = property.size;
      $('#image').val(image_rename);

      const data = {
          device_name: $('[name=device_name]').val(),
          serial_number: 's',
          version: $('[name=version]').val(),
          release_year: $('[name=release_year]').val(),
          photo: property,
          photoname: image_rename,
          price: $('[name=price]').val(),
          input_count: $('[name=input_count]').val(),
      }

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
          ajax('/device', data, null, dataTable)
          $('#modalAdd').modal('hide')
      }
    }
    })

    $('.edit').on('click', (e) => {
        e.preventDefault()
        if ($('#editForm').valid()) {
          if ($('#fileEdit').val() == "") {
            let data = {
              id: $('#idEdit').val(),
              device_name: $('[name=device_nameEdit]').val(),
              serial_number: $('[name=serial_numberEdit]').val(),
              version: $('[name=versionEdit]').val(),
              release_year: $('[name=release_yearEdit]').val(),
              photo: null,
              photoname: $('#imageEdit').val(),
              price: $('[name=priceEdit]').val(),
            }
            ajax('/device/updated/', data, null, dataTable)
          }else {
            const property = document.getElementById("fileEdit").files[0];
            const image_name = property.name;
            const image_extension = image_name.split('.').pop().toLowerCase();
            const image_rename = `${makeid(40)}.${image_extension}`;
            const image_size = property.size;
            $('#imageEdit').val(image_rename);

            let datas = {
              id: $('#idEdit').val(),
              device_name: $('[name=device_nameEdit]').val(),
              serial_number: $('[name=serial_numberEdit]').val(),
              version: $('[name=versionEdit]').val(),
              release_year: $('[name=release_yearEdit]').val(),
              photo: property,
              photoname: image_rename,
              price: $('[name=priceEdit]').val(),
            }

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
                ajax('/device/updated/', datas, null, dataTable)
            }
          }
        }
        $('#modalEdit').modal('hide')
        $('.btn-edit').addClass('disabled')
        $('.btn-delete').addClass('disabled')
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
      ajax('/device/'+id[0], ids, 'PUT', dataTable)
      $('#modalDelete').modal('hide')
      $('.btn-edit').addClass('disabled')
      $('.btn-delete').addClass('disabled')
    })



      dataTable
         .on('select', function ( e, dt, type, indexes ) {
             $('.btn-edit').removeClass('disabled')
             $('.btn-delete').removeClass('disabled')
             var rowData = dataTable.rows( indexes ).data().toArray();
             $('[name=device_nameEdit]').val(rowData[0].device_name)
             $('[name=serial_numberEdit]').val(rowData[0].serial_number)
             $('[name=versionEdit]').val(rowData[0].version)
             $('[name=release_yearEdit]').val(rowData[0].release_year)
             $('[name=priceEdit]').val(rowData[0].price)
             $('#imageEdit').val(rowData[0].photo)
             $('#currentImage').attr('src', '/'+rowData[0].photo)
             $('#idEdit').val(rowData[0].id)
             $('#idDelete').append('<input type="hidden" name="'+rowData[0].id+'">')
             $('#idDelete').html('')
             for (var i = 0; i < rowData.length; i++) {
               $('#idDelete').append('<input type="hidden" name="'+rowData[i].id+'">')
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
