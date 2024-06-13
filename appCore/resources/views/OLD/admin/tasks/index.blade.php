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
                    <div class="col-md-10">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i> Sarcini</header>
                            </div><!--end .card-head -->
                            @if(session('message'))
                                <div class="alert alert-danger">{{session('message')}}</div>
                            @elseif(session('task-created-message'))
                                <div class="alert alert-success">{{session('task-created-message')}}</div>
                            @elseif(session('task-updated-message'))
                                <div class="alert alert-success">{{session('task-updated-message')}}</div>
                            @elseif(session('finish'))
                                <div class="alert alert-success">{{session('finish')}}</div>
                            @endif
                            <div class="card-body style-default-bright">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Owner</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Affiliated Employees</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Completed At</th>
                                            <th>Edit</th>
                                            <th>Finish</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Owner</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Affiliated Employees</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Completed At</th>
                                            <th>Edit</th>
                                            <th>Finish</th>
                                            <th>Delete</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($tasks as $task)
                                            <tr>
                                                <td>{{$task->employee->name}} {{$task->employee->surname}}</td>
                                                <td><a href="{{route('task.edit', $task->id)}}">{{$task->title}}</a>
                                                </td>
                                                <td>{{$task->description}}</td>
                                                <td>
                                                    @foreach($task->employees as $task_employee)
                                                        {{$task_employee->name}} {{$task_employee->surname}}@if($loop->last).@else,@endif
                                                    @endforeach
                                                </td>
                                                <td>{{$task->created_at}}</td>
                                                <td>{{$task->updated_at}}</td>

                                                <td>
                                                    @if(!$task->completed_at)
                                                        Uncompleted
                                                    @endif
                                                    {{$task->completed_at}}
                                                </td>
                                                <td>
                                                    <a href="{{route('task.edit', $task->id)}}"><button type="submit" class="btn btn-primary">Edit</button></a>
                                                </td>
                                                <td>
                                                    <form action="{{route('task.finish', $task->id)}}" method="post"
                                                          enctype="smultipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-success"
                                                                @if($task->completed_at)
                                                                disabled
                                                            @endif
                                                        >Finish
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{route('task.destroy', $task->id)}}" method="post"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
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
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
