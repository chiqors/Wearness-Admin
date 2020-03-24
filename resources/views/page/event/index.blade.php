@extends('index')

@section('style')
  <link rel="stylesheet" href="{{ asset('/css/asset/tempusdominus/tempusdominus.min.css') }}">  

  <link href="{{ asset('/css/asset/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/asset/fullcalendar/core.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/asset/fullcalendar/daygrid.min.css') }}" rel="stylesheet" />
  
<style>
        .fc-left{
            color:black;
        }
        .fc-title{
            color: white;
        }
    </style>
@endsection

@section('header')
<div class="col-6 col-md-8">
    <h1><span>Event</span> Table</h1>
    <p>Hi {{ Auth::user()->name }}, this is event table</p>
</div>
<div class="col-6 col-md-4 text-right">       
</div>
@endsection

@section('content')
<style>
 .select2-container {
            z-index: 99999;
        }
        </style>
<div class="col-md-12 p-3 rounded">
  <div class="card">
    <div class="card-body">
            <div id='calendar'></div>
  </div>
</div>
</div>

<div class="modal fade text-dark" id="modalAdd">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addForm" action="" method="post">
            <div class="modal-body">
                <div class="row">
                <div class="col-md-6">
                    <label for=""><span class="font-weight-400">Event start</span></label>
                    <div id="eventStart"></div>
                </div>
                <div class="col-md-6">
                    <label for=""><span class="font-weight-400">Event end</span></label>
                    <div id="eventEnd"></div>
                </div>
                <div class="col-md-12">
                    <label for=""><span class="font-weight-400">Label color</span></label>
                    <input type="color" class="form-control" name="color" value="#3788d8">
                </div>
                <div class="col-md-12">
                    <label for=""><span class="font-weight-400">Title</span></label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="col-md-12">
                    <label for=""><span class="font-weight-400">Instructor</span></label>
                    <select class="select2" name="instructor[]" style="width:100% !important;" multiple required>
                            @foreach ($instructor as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="col-md-12">
                    <label for=""><span class="font-weight-400">Desc</span></label>
                    <textarea name="desc" id="" cols="30" rows="10" class="form-control" required></textarea>
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


<div class="modal fade text-dark" id="modalEdit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" action="" method="post">
            <div class="modal-body">
                <input type="hidden" id="idEdit">
                <div class="row">
                <div class="col-md-6">
                    <label for=""><span class="font-weight-400">Event start</span></label>
                    <div id="eventStartEdit"></div>
                </div>
                <div class="col-md-6">
                    <label for=""><span class="font-weight-400">Event end</span></label>
                    <div id="eventEndEdit"></div>
                </div>
                <div class="col-md-12">
                    <label for=""><span class="font-weight-400">Label color</span></label>
                    <input type="color" class="form-control" name="colorEdit" value="#3788d8">
                </div>
                <div class="col-md-12">
                    <label for=""><span class="font-weight-400">Title</span></label>
                    <input type="text" class="form-control" name="titleEdit" required>
                </div>
                <div class="col-md-12">
                    <label for=""><span class="font-weight-400">Instructor</span></label>
                    <select class="select2" id="instructorEdit" name="instructorEdit[]" style="width:100% !important;" multiple required>
                            @foreach ($instructor as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="col-md-12">
                    <label for=""><span class="font-weight-400">Desc</span></label>
                    <textarea name="descEdit" id="" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">Delete</button>
                <button type="submit" class="btn btn-primary update">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-dark" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg text-white">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteForm" action="" method="post">
                <div id="idDelete">
                </div>
            <div class="modal-body">
                <h3>Are you sure? you cannot prevent back</h3>
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
<script src="{{ asset('js/bin/moment.js') }}"></script>
<script src="{{ asset('/js/bin/popper.min.js') }}"></script>
<script src="{{ asset('/js/bin/bootsrap.min.js') }}"></script>
<script src="{{ asset('js/bin/tempusdominus.min.js') }}"></script>
<script src="{{ asset('/js/bin/scroll.js') }}"></script>
<script src="{{ asset('/js/bin/custom.js') }}"></script>


<script src="{{ asset('/js/asset/jqueryValidate/jquery.validate.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/jqueryValidate/additional-methods.min.js') }}" charset="utf-8"></script>

<script src="{{ asset('/js/asset/sweetAlert/sweetalert.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/select2/select2.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/fullcalendar/core.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/fullcalendar/daygrid.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/asset/fullcalendar/interaction.min.js') }}" charset="utf-8"></script>

<script type="text/javascript">    
    $('#eventStart').datetimepicker({
        format: 'YYYY-MM-DD',
        inline: true,
        sideBySide: true
    });

    $('#eventEnd').datetimepicker({
        format: 'YYYY-MM-DD',
        inline: true,
        sideBySide: true
    });

    $('#eventStartEdit').datetimepicker({
        format: 'YYYY-MM-DD',
        inline: true,
        sideBySide: true
    });

    $('#eventEndEdit').datetimepicker({
        format: 'YYYY-MM-DD',
        inline: true,
        sideBySide: true
    });

    $('.select2').select2();

      let calendarEl = document.getElementById('calendar');

        let calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'dayGrid', 'interaction' ],
          defaultView: 'dayGridMonth',          
          eventLimit: true, // for all non-TimeGrid views
          views: {
                timeGrid: {
                eventLimit: 6 // adjust to 6 only for timeGridWeek/timeGridDay
                }
           },
           dateClick: function(info) {
                // alert('Clicked on: ' + info.dateStr);
                // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                // alert('Current view: ' + info.view.type);
                // change the day's background color just for fun
                $('.fc-day.fc-widget-content').css('background-color', '')
                $('#modalAdd').modal('show')
                info.dayEl.style.backgroundColor = '#c2dbfb';
                $('#eventStart').datetimepicker('date', info.dateStr)
                $('#eventEnd').datetimepicker('date', info.dateStr)
            },
           events: '/event/create',
            eventClick: function(info) {
                $('#modalEdit').modal('show')
                // alert('Event: ' + info.event.id);                
                const id =  info.event.id
                $('#idEdit').val(id)         
                $.ajax({
                    type: "GET",
                    headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },                
                    data: {id : id},
                    url: "/event/"+id,
                    dataType: "json",
                    success: (data) => {
                        $('[name=titleEdit]').val(data.event.title)
                        $('#eventEndEdit').datetimepicker('date', data.end)
                        $('#eventStartEdit').datetimepicker('date', data.event.start)                    
                        $('[name=descEdit]').val(data.event.desc)
                        $('[name=colorEdit]').val(data.event.color)
                        $('#instructorEdit').val(data.instructor)
                        $('#instructorEdit').trigger('change')                                                                                
                    }
                })       
            }
        });            
        
        calendar.render();

        $('#modalAdd').on('hide.bs.modal', function (e) {
            $('[name=title]').val('')
            $('[name=desc]').val('')
            $('.select2').val([])
            $('.select2').trigger('change') 
        })

        $('#modalEdit').on('show.bs.modal', function (e) {
           
        })



      $('.submit').on('click', (e) => {
        e.preventDefault()
        if($('#addForm').valid()){     
            const data = {
                title: $('[name=title]').val(),
                event_start: $('#eventStart').data('date'),
                event_end: $('#eventEnd').data('date'),
                desc: $('[name=desc]').val(),
                color: $('[name=color]').val(),
                photo: null,
                photoname: null,
                instructor: $('.select2').val(),
            }
            
            if ($('#eventStart').data('date') >=  $('#eventEnd').data('date')) {
                swal({
                title: "Oh no maker!",
                text: "Please make sure event end higher than from evnet start",                
                icon: "error",
                button: "Ok!",
              });
            }else{
            ajax('/event', data, null, null)
            $('#modalAdd').modal('hide')
            calendar.refetchEvents()
            setTimeout(calendar.refetchEvents(), 1000)
            }
        }
    })

      $('.update').on('click', (e) => {
        e.preventDefault()
        if($('#editForm').valid()){     
            const id =  $('#idEdit').val()
            const data = {
                title: $('[name=titleEdit]').val(),
                event_start: $('#eventStartEdit').data('date'),
                event_end: $('#eventEndEdit').data('date'),
                desc: $('[name=descEdit]').val(),
                color: $('[name=colorEdit]').val(),
                photo: null,
                photoname: null,
                instructor: $('#instructorEdit').val(),
            }
            
            if ($('#eventStartEdit').data('date') >=  $('#eventEndEdit').data('date')) {
                swal({
                title: "Oh no maker!",
                text: "Please make sure event end higher than from evnet start",                
                icon: "error",
                button: "Ok!",
              });
            }else{
                ajax('/event/'+id, data, 'PUT', null)
                $('#modalEdit').modal('hide')
                calendar.refetchEvents()
                setTimeout(calendar.refetchEvents(), 1000)
            }
        }
    })

    $('.delete').on('click', (e) => {
      e.preventDefault()
      const id =  $('#idEdit').val()
      const ids = {
        'id': id,
        'photo': null
      }
      ajax('/event/'+id, ids, 'DELETE', null)
      $('#modalDelete').modal('hide')
      $('#modalEdit').modal('hide')
      setTimeout(calendar.refetchEvents(), 1000)
    })

</script>
@endpush
