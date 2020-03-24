@extends('index')

@section('style')
  <link href="{{ asset('/css/asset/fullcalendar/core.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/css/asset/fullcalendar/daygrid.min.css') }}" rel="stylesheet" />
    <style>
    .bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
    }

    .bg-c-green {
        background: linear-gradient(45deg,#2ed8b6,#59e0c5);
    }

    .bg-c-yellow {
        background: linear-gradient(45deg,#FFB64D,#ffcb80);
    }

    .bg-c-pink {
        background: linear-gradient(45deg,#FF5370,#ff869a);
    }
    .card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    }

    .card .card-block {
        padding: 25px;
    }

    .order-card i {
        font-size: 26px;
    }
    .fc-left{
            color:black;
        }
        .fc-title{
            color: white;
        }

        span.event-title {
    font-size: .8rem;
    font-weight: 500;
}
    </style>
@endsection

@section('content')
  <div class="col-md-10">
    <h1>Welcome Back, <span>{{ Auth::user()->name }}</span> </h1>
    <p>Hi {{ Auth::user()->name }}, this is your dashboard</p>
  </div>
  <div class="col-md-2">
    <a href="{{ url('/setting') }}" class="btn btn-light rounded-circle text-warning shadow mr-3"><i class="fas fa-user"></i></a>
    <a class="btn btn-light rounded-circle text-danger shadow" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
 
  <div class="col-md-4 mt-3">
    <div class="card bg-c-green order-card">
      <div class="card-block">
        <h2 class="text-center"><i class="fa fa-users float-left"></i><span>{{ count($customer) }}</span></h2>      
        <h6 class="text-center ml-4">Customer register </h6>
      </div>
    </div>
  </div>
  
  <div class="col-md-4 mt-3">
      <div class="card bg-c-blue order-card">
          <div class="card-block">
            <h2 class="text-center"><i class="fa fa-cart-plus float-left"></i><span>{{ count($device) }}</span></h2>                            
            <h6 class="text-center ml-4">Device sales</h6>
          </div>
      </div>
  </div>

  <div class="col-md-4 mt-3">
      <div class="card bg-c-pink order-card">
          <div class="card-block">
            <h2 class="text-center"><i class="fa fa-user-tie float-left"></i><span>{{ count($instructor) }}</span></h2>      
            <h6 class="text-center ml-4">Instructor added </h6>
          </div>
      </div>
  </div>
  
  <div class="col-md-12 p-3 rounded">
      <div class="card">
        <div class="card-body">
          <h4 class="text-muted">Calendar Event</h4>
                <div id='calendar' class="text-dark"></div>
      </div>
    </div>
    </div>


    <div class="modal fade text-dark" id="modalEdit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" action="" method="post">
                <div class="modal-body">
                    <input type="hidden" id="idEdit">
                    <div class="row">                                   
                    <div class="col-md-12">
                        <span class="event-title">Title event</span>
                        <h3 id="titleEvent"></h3>
                    </div>
                    <div class="col-md-12">
                      <hr>
                      <span class="event-title">Instructor event</span>
                      <div id="instructorEvent">
                        <ul></ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <span class="event-title">Desc event</span>
                        <p id="descEvent" class="text-dark"></p>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                    
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
  <script src="{{ asset('/js/bin/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/bin/popper.min.js') }}"></script>
  <script src="{{ asset('/js/bin/bootsrap.min.js') }}"></script>
  <script src="{{ asset('/js/bin/scroll.js') }}"></script>
  <script src="{{ asset('/js/bin/custom.js') }}"></script>
  
  <script src="{{ asset('/js/asset/fullcalendar/core.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('/js/asset/fullcalendar/daygrid.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('/js/asset/fullcalendar/interaction.min.js') }}" charset="utf-8"></script>


  <script type="text/javascript">
    $(document).ready(function () {
      
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
                      $('#titleEvent').text(data.event.title)                                                            
                      $('#descEvent').text(data.event.desc)     
                      $.each(data.instructor_name, function (index, val) {                        
                        $('#instructorEvent ul').append('<li>'+val+'</li>')
                      })
                                                                             
                    }
                })       
            }
        });            
        
        calendar.render();

        $('#modalEdit').on('hide.bs.modal', function (e) {
          $('#instructorEvent ul').html('')
          })
    })
  </script>
@endpush
