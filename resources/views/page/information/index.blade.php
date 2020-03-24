@extends('index')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/asset/tempusdominus/tempusdominus.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/asset/dataTable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/asset/dataTable/select.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/asset/dataTable/buttons.bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="col-6 col-md-8">
    <h1><span>Information</span> Table</h1>
    <p>Hi {{ Auth::user()->name }}, this is information table</p>
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
                  <th scope="col">Information</th>
                  <th scope="col">From date</th>                  
                  <th scope="col">Until date</th>                  
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
                                <label for=""><span class="font-weight-400">Title</span></label>
                                <input type="text" class="form-control" name="title" placeholder="Write a title information" required>
                            </div>
                        </div>                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Information</span></label>
                                <textarea name="information"   class="form-control" placeholder="Information" rows="8" cols="80" required></textarea>                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span class="font-weight-400">From date</span></label>
                            <div class="input-group date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input fromdate" data-toggle="datetimepicker" data-target=".fromdate" placeholder="Pick the from date" name="fromdate" required/>
                                <div class="input-group-append" data-target=".fromdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>                                               
                        <div class="col-md-12">
                            <label for=""><span class="font-weight-400">Until date</span></label>
                            <div class="input-group date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input untildate" data-toggle="datetimepicker" data-target=".untildate" placeholder="Pick the until date" name="untildate" required/>
                                <div class="input-group-append" data-target=".untildate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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
                                    <label for=""><span class="font-weight-400">Title</span></label>
                                    <input type="text" class="form-control" name="titleEdit" placeholder="Write a title information" required>
                                </div>
                            </div>                        
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><span class="font-weight-400">Information</span></label>
                                    <textarea name="informationEdit"   class="form-control" placeholder="Information" rows="8" cols="80" required></textarea>                                
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for=""><span class="font-weight-400">From date</span></label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input fromdateEdit" data-toggle="datetimepicker" data-target=".fromdateEdit" placeholder="Pick the from date" name="fromdateEdit" required/>
                                    <div class="input-group-append" data-target=".fromdateEdit" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>                                               
                            <div class="col-md-12">
                                <label for=""><span class="font-weight-400">Until date</span></label>
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input untildateEdit" data-toggle="datetimepicker" data-target=".untildateEdit" placeholder="Pick the until date" name="untildateEdit" required/>
                                    <div class="input-group-append" data-target=".untildateEdit" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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
                <h5 class="modal-title" id="modalEditLabel">Delete information</h5>
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

<div class="modal fade text-dark" id="modalInformation" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="information" class="text-dark"></p>
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
    function information(data){
        $('#modalInformation').modal('show')  
        $('#information').text(data)
    }
    $(document).ready(function() {
      const dataTable = $('.dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('information.create') !!}',
        columns: [
        { data: 'DT_RowIndex',name: 'DT_RowIndex' ,orderable: false,searchable: false, editable: true },
        { data: 'title', name: 'title' },        
        { data: 'information', name: 'information',        
          render: function (data) {
            return "<button class='btn btn-primary' onClick='information(\""+data+"\")'>Information</button>";
          }
        },
        { data: 'fromdate', name: 'fromdate' },
        { data: 'untildate', name: 'untildate' },
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

      $('.fromdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
      $('.untildate').datetimepicker({
        format: 'YYYY-MM-DD'        
    });

      $('.fromdateEdit').datetimepicker({
        format: 'YYYY-MM-DD'
    });
      $('.untildateEdit').datetimepicker({
        format: 'YYYY-MM-DD'        
    });
     

    $('#modalAdd').on('hide.bs.modal', function (e) {
       $('[name=title]').val('')
       $('[name=information]').val('')
       $('[name=fromdate]').val('')
       $('[name=untildate]').val('')
      })

    $('#modalEdit').on('hide.bs.modal', function (e) {
       $('.custom-file-label').text('Choose file')
       $('#fileEdit').val('');
      })

    $('.submit').on('click', (e) => {
    e.preventDefault()
    if($('#addForm').valid()){     
      const data = {
          title: $('[name=title]').val(),
          information: $('[name=information]').val(),
          fromdate: $('[name=fromdate]').val(),
          untildate: $('[name=untildate]').val(),
      }

      if ($('.fromdate').val() > $('.untildate').val()) {
        swal({
          title: "Oh no maker!",
          text: "Please make sure until date higher than from date",
          icon: "error",
          button: "Ok!",
        });      
      } else {
          ajax('/information', data, null, dataTable)
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
              information: $('[name=informationEdit]').val(),
              fromdate: $('[name=fromdateEdit]').val(),
              untildate: $('[name=untildateEdit]').val(),
            }           

            if ($('.fromdateEdit').val() > $('.untildateEdit').val()) {
              swal({
                title: "Oh no maker!",
                text: "Please make sure until date higher than from date",                
                icon: "error",
                button: "Ok!",
              });
            }else {
                ajax('/information/updated/', data, null, dataTable)
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
      ajax('/information/'+id[0], ids, 'PUT', dataTable)
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
             $('[name=informationEdit]').val(rowData[0].information)
             $('[name=fromdateEdit]').val(rowData[0].fromdate)
             $('[name=untildateEdit]').val(rowData[0].untildate)             
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
