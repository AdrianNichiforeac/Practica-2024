<x-admin-master>
    @section('content')
        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Tasks</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i> Editează sarcina</header>
                            </div><!--end .card-head -->

                            <form class="form" method="post" action="{{route('task.update', $task->id)}}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body style-default-bright">
                                    <div class="card-body floating-label">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text"
                                                           name="title"
                                                           class="form-control"
                                                           id="title"
                                                           aria-describedby=""
                                                           value="{{$task->title}}">
                                                    <label for="Name">Title</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea
                                                        name="description"
                                                        id="description"
                                                        rows="5" class="form-control">{{$task->description}}</textarea>
                                                    <label for="textarea1">Textarea</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                    <div class="card-actionbar">
                                        <div class="card-actionbar-row">
                                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Trimite</button>
                                        </div>
                                    </div>
                                </div><!--end .card -->
                            </form><!--end .card-body -->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i>Angajați atașați</header>
                            </div><!--end .card-head -->
                            <div class="card-body style-default-bright">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Detach</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Detach</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($employees as $employee)
                                            @if($employee->tasks->contains($task))

                                                <tr>
                                                    <td>{{$employee->id}}</td>
                                                    <td>{{$employee->name}}</td>
                                                    <td>{{$employee->surname}}</td>
                                                    <td>
                                                        <form action="{{route('employee.task.detach', $employee)}}"
                                                              method="post">
                                                            @method('PUT')
                                                            @csrf
                                                            <input type="hidden" name="task" value="{{$task->id}}">
                                                            <button class="btn btn-danger">Detach
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end .card-body -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i>Toți angajații</header>
                            </div><!--end .card-head -->
                            <div class="card-body style-default-bright">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Attach</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Attach</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($employees as $employee)
                                            @if(!$employee->tasks->contains($task))
                                                <tr>
                                                    <td>{{$employee->id}}</td>
                                                    <td>{{$employee->name}}</td>
                                                    <td>{{$employee->surname}}</td>
                                                    <td>
                                                        <form action="{{route('employee.task.attach', $employee)}}"
                                                              method="post">
                                                            @method('PUT')
                                                            @csrf
                                                            <input type="hidden" name="task" value="{{$task->id}}">
                                                            <button class="btn btn-primary">Attach</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
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
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
