<x-admin-master>
    @section('content')
        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Calendar</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <!-- BEGIN CALENDAR -->
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-head style-primary">
                                <header>
                                    <span class="selected-day">Sunday</span> &nbsp;	<small class="selected-date">13 December 2020</small>
                                </header>
                                <div class="tools">
                                    <div class="btn-group">
                                        <a id="calender-today" class="btn btn-flat ink-reaction">Today</a>
                                        <a id="calender-prev" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-left"></i></a>
                                        <a id="calender-next" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
                                    <li data-mode="month" class="active"><a href="#">Month</a></li>
                                    <li data-mode="agendaWeek"><a href="#">Week</a></li>
                                    <li data-mode="agendaDay"><a href="#">Day</a></li>
                                </ul>
                            </div><!--end .card-head -->
                            <div class="card-body no-padding">
                                <div id="calendar" class="fc fc-ltr fc-unthemed"></div>
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                    </div><!--end .col -->
                    <div class="col-md-6">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i> Employees and Clients birth dates</header>
                            </div><!--end .card-head -->
                            <div class="card-body style-default-bright">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($dates as $date)
                                            <tr>
                                                <td>{{$date->name}}</td>
                                                <td>{{$date->date}}</td>
                                                <td>{{$date->phone}}</td>
                                                <td>{{$date->email}}</td>
                                                <td>{{$date->type}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end .card-body -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection

    @section('scripts')


        <script src="{{asset('js/materialadmin/libs/fullcalendar/fullcalendar.min.js')}}"></script>
        <script src="{{asset('js/materialadmin/core/demo/DemoCalendar.js')}}"></script>

        {{--Old scripts (to delete)--}}
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
        {{--END Old scripts (to delete)--}}
    @endsection
</x-admin-master>
