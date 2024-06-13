<x-admin-master>
@section('content')
    <!-- BEGIN CONTENT-->
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Users</li>
            </ol>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-bordered style-primary">
                        <div class="card-head">
                            <header><i class="fa fa-fw fa-users"></i> Informații despre utilizatori</header>
                        </div><!--end .card-head -->
                        @if(session('employee-deleted'))
                            <div class="alert alert-danger">{{session('employee-deleted')}}</div>
                        @endif
                        <div class="card-body style-default-bright">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Registered on</th>
                                        <th>Updated profile date</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Registered on</th>
                                        <th>Updated profile date</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{$employee->id}}</td>
                                            <td><a href="{{route('employee.profile.edit', $employee->id)}}">{{$employee->name}}</a></td>
                                            <td>{{$employee->surname}}</td>
                                            <td>{{$employee->created_at}}</td>
                                            <td>{{$employee->updated_at}}</td>
                                            <td>
                                                <form action="{{route('employee.destroy', $employee->id)}}" method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{route('employee.profile.edit', $employee->id)}}"><button type="submit" class="btn btn-primary">Edit</button></a>
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
