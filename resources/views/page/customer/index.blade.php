@extends('index')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/asset/tempusdominus/tempusdominus.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/asset/dataTable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/asset/dataTable/select.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/asset/dataTable/buttons.bootstrap4.min.css') }}">
@endsection

@section('header')
<div class="col-6 col-md-8">
    <h1><span>Customer</span> Table</h1>
    <p>Hi {{ Auth::user()->name }}, this is customer table</p>
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
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone number</th>
                  <th scope="col">Religion</th>
                  <th scope="col">Job</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Address</th>
                  <th scope="col">Institution</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Birth date</th>
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
                <h5 class="modal-title" id="modalAddLabel">Add customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addForm" action="" method="post">
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
                                <label for=""><span class="font-weight-400">Email</span></label>
                                <input type="email" class="form-control" name="email" placeholder="Write a email" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Phone number</span></label>
                                <input type="number" class="form-control" name="phone_number" placeholder="Write a phone number" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for=""><span class="font-weight-400">Religion</span></label>
                                <select class="form-control" name="religion" required>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Others">Others</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for=""><span class="font-weight-400">Job</span></label>
                            <input type="text" class="form-control" name="job" placeholder="Write a job" required>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <p class="text-dark font-weight-400">Gender</p>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="gender1" name="gender" value="Male" class="custom-control-input" checked required>
                              <label class="custom-control-label" for="gender1">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="gender2" name="gender" value="Female" class="custom-control-input" required>
                              <label class="custom-control-label" for="gender2">Female</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><span class="font-weight-400">Address</span></label>
                                <textarea name="address"  maxlength="150" class="form-control" placeholder="Address" rows="8" cols="80"></textarea>
                                <span class="fs-small text-danger rchars">150</span> <span class="fs-small text-danger">Character(s) Remaining</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for=""><span class="font-weight-400">Institution</span></label>
                            <input type="text" class="form-control" name="institution" placeholder="Write a institution" required>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span class="font-weight-400">Photo</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="photo">
                                    <input type="hidden" id="image" name="" value="">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for=""><span class="font-weight-400">Birth date</span></label>
                            <div class="input-group date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input birth_date" data-toggle="datetimepicker" data-target=".birth_date" placeholder="Pick the birth date" name="birth_date" required/>
                                <div class="input-group-append" data-target=".birth_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                          <div class="form-group">
                            <label for=""><span class="font-weight-400">Serial number / Device</span></label>
                              <select class="form-control" name="device" required>
                                  @foreach ($device as $key => $value)
                                      <option value="{{ $value->id }}">{{ $value->serial_number }} / {{ $value->device_name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div> --}}
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
                <h5 class="modal-title" id="modalEditLabel">Edit customer</h5>
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
                          <input type="text" class="form-control" name="nameEdit" placeholder="Write a name" required>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for=""><span class="font-weight-400">Email</span></label>
                          <input type="email" class="form-control" name="emailEdit" placeholder="Write a email" required>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for=""><span class="font-weight-400">Phone number</span></label>
                          <input type="number" class="form-control" name="phone_numberEdit" placeholder="Write a phone number" min="0" required>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for=""><span class="font-weight-400">Religion</span></label>
                          <select class="form-control" name="religionEdit" required>
                              <option value="Islam">Islam</option>
                              <option value="Kristen Protestan">Kristen Protestan</option>
                              <option value="Kristen Katolik">Kristen Katolik</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Buddha">Buddha</option>
                              <option value="Konghucu">Konghucu</option>
                              <option value="Others">Others</option>
                          </select>

                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for=""><span class="font-weight-400">Job</span></label>
                      <input type="text" class="form-control" name="jobEdit" placeholder="Write a job" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <p class="text-dark font-weight-400">Gender</p>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="genderEdit1" name="genderEdit" value="Male" class="custom-control-input"  required>
                        <label class="custom-control-label" for="genderEdit1">Male</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="genderEdit2" name="genderEdit" value="Female" class="custom-control-input" required>
                        <label class="custom-control-label" for="genderEdit2">Female</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for=""><span class="font-weight-400">Address</span></label>
                          <textarea name="addressEdit"  maxlength="150" class="form-control" placeholder="Address" rows="8" cols="80"></textarea>
                          <span class="fs-small text-danger rchars">150</span> <span class="fs-small text-danger">Character(s) Remaining</span>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for=""><span class="font-weight-400">Institution</span></label>
                      <input type="text" class="form-control" name="institutionEdit" placeholder="Write a institution" required>
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
                  <div class="col-md-12">
                      <label for=""><span class="font-weight-400">Birth date</span></label>
                      <div class="input-group date" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input birth_dateEdit" data-toggle="datetimepicker" data-target=".birth_dateEdit" placeholder="Pick the birth date" name="birth_dateEdit" required/>
                          <div class="input-group-append" data-target=".birth_dateEdit" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <p class="text-dark font-weight-400">Status</p>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="statusEdit1" name="statusEdit" value="On" class="custom-control-input"  required>
                        <label class="custom-control-label" for="statusEdit1">On</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="statusEdit2" name="statusEdit" value="Off" class="custom-control-input" required>
                        <label class="custom-control-label" for="statusEdit2">Off</label>
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
                <h5 class="modal-title" id="modalEditLabel">Delete customer</h5>
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

<script src="{{ asset('/js/asset/jqueryValidate/jquery.validate.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/jqueryValidate/additional-methods.min.js') }}" charset="utf-8"></script>

<script src="{{ asset('/js/asset/sweetAlert/sweetalert.min.js') }}" charset="utf-8"></script>

<script type="text/javascript">
    $(document).ready(function() {
      const url = '{{ $app->url1 }}'
      const dataTable = $('.dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('customer.create') !!}',
        columns: [
        { data: 'DT_RowIndex',name: 'DT_RowIndex' ,orderable: false,searchable: false, editable: true },
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'phone_number', name: 'phone_number' },
        { data: 'religion', name: 'religion' },
        { data: 'job', name: 'job' },
        { data: 'gender', name: 'gender' },
        { data: 'address', name: 'address' },
        { data: 'institution', name: 'institution' },
        { data: 'photo',
          name: 'photo' ,
          render: function (data, type ,row) {
            if(data === null){
              return "<img src=\"/image/asset/default-user.png\" height=\"50\" alt='not loaded, reload the webpage' class='img-click' onClick='imageClick(\"/image/asset/default-user.png\")'/>";
            }else if(row.added == 'register'){
              return "<img src=\""+  url  +"/image/asset/customer/"+ data + "\" height=\"50\" alt='not loaded, reload the webpage' class='img-click' onClick='imageClick(\"/" + data + "\")'/>";
            }else {
              return "<img src=\"/" + data + "\" height=\"50\" alt='not loaded, reload the webpage' class='img-click' onClick='imageClick(\"/" + data + "\")'/>";
            }            
          }
        },
        { data: 'birth_date', name: 'birth_date' },
        { data: 'status', name: 'status' },
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

      $('.birth_date').datetimepicker({
        format: 'YYYY-MM-DD'
    });

      $('.birth_dateEdit').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $('#modalAdd').on('hide.bs.modal', function (e) {
      $('[name=name]').val(''),
      $('[name=email]').val(''),
      $('[name=phone_number]').val(''),
      $('[name=religion]').val('Islam'),
      $('[name=job]').val(''),
      $('#gender1').prop('checked',true),
      $('[name=address]').val(''),
      $('[name=institution]').val(''),
      $('[name=birth_date]').val(''),
      $('[name=status]').attr('checked',false),
      $('#status1').prop('checked',true),
       $('.custom-file-label').text('Choose file')
       $('#file').val('');
      })

    $('#modalEdit').on('hide.bs.modal', function (e) {
       $('.custom-file-label').text('Choose file')
       $('#fileEdit').val('');
      })

    $('.submit').on('click', (e) => {
    e.preventDefault()
    if($('#addForm').valid()){
      let data = {
        name: $('[name=name]').val(),
        email: $('[name=email]').val(),
        phone_number: $('[name=phone_number]').val(),
        religion: $('[name=religion] :selected').val(),
        photo: null,
        photoname: $('#image').val(),
        job: $('[name=job]').val(),
        gender: $('[name=gender]:checked').val(),
        address: $('[name=address]').val(),
        institution: $('[name=institution]').val(),
        birth_date: $('[name=birth_date]').val(),
        status: $('[name=status]:checked').val(),
      }
      if ($('#file').val() == "") {
        ajax('/customer', data, null, dataTable)
      }else{
        const property = document.getElementById("file").files[0];
        const image_name = property.name;
        const image_extension = image_name.split('.').pop().toLowerCase();
        const image_rename = `${makeid(40)}.${image_extension}`;
        const image_size = property.size;
        $('#image').val(image_rename);

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
          ajax('/customer', data, null, dataTable)
        }
        $('#modalAdd').modal('hide')
      }
    }
    })

    $('.edit').on('click', (e) => {
        e.preventDefault()
        if ($('#editForm').valid()) {
          let data = {
              id: $('#idEdit').val(),
              name: $('[name=nameEdit]').val(),
              email: $('[name=emailEdit]').val(),
              phone_number: $('[name=phone_numberEdit]').val(),
              religion: $('[name=religionEdit] :selected').val(),
              photo: null,
              photoname: $('#imageEdit').val(),
              job: $('[name=jobEdit]').val(),
              gender: $('[name=genderEdit]:checked').val(),
              address: $('[name=addressEdit]').val(),
              institution: $('[name=institutionEdit]').val(),
              birth_date: $('[name=birth_dateEdit]').val(),
              status: $('[name=statusEdit]:checked').val(),
            }
          if ($('#fileEdit').val() == "") {            
            ajax('/customer/updated/', data, null, dataTable)
          }else {
            const property = document.getElementById("fileEdit").files[0];
            const image_name = property.name;
            const image_extension = image_name.split('.').pop().toLowerCase();
            const image_rename = `${makeid(40)}.${image_extension}`;
            const image_size = property.size;
            $('#imageEdit').val(image_rename);

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
                ajax('/customer/updated/', data, null, dataTable)
            }
          }
        }
        $('#modalEdit').modal('hide')
        $('.btn-edit').addClass('disabled')
        $('.btn-delete').addClass('disabled')
        dataTable.rows().deselect();
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
      ajax('/customer/'+id[0], ids, 'PUT', dataTable)
      $('#modalDelete').modal('hide')
      $('.btn-edit').addClass('disabled')
      $('.btn-delete').addClass('disabled')
    })



      dataTable
         .on('select', function ( e, dt, type, indexes ) {
             $('.btn-edit').removeClass('disabled')
             $('.btn-delete').removeClass('disabled')
             var rowData = dataTable.rows( indexes ).data().toArray();
             $('[name=nameEdit]').val(rowData[0].name),
             $('[name=emailEdit]').val(rowData[0].email),
             $('[name=phone_numberEdit]').val(rowData[0].phone_number),
             $('[name=rekening_numberEdit]').val(rowData[0].rekening_number),             
             $('[name=religionEdit]').val(rowData[0].religion),
             $('[name=jobEdit]').val(rowData[0].job),
             $('[name=addressEdit]').val(rowData[0].address),
             $('.rchars').text(150-rowData[0].address.length)
             $('[name=birth_dateEdit]').val(rowData[0].birth_date),
             $('[name=institutionEdit]').val(rowData[0].institution),
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
                $('#statusEdit1').prop('checked', true)
             }else {
                $('#statusEdit2').prop('checked', true)
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
