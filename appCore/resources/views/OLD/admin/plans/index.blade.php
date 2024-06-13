<x-admin-master>
    @section('content')
        <div id="content">

            <div class="style-default-bright col-md-12" >
                <div class="card">
                    <div class="card-head style-primary">
                        <header>Plans</header>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-md-12">
                                <article class="margin-bottom-xxl">
                                    <p class="lead">
                                    </p>
                                </article>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Client</th>
                                            <th>Date Written</th>
                                            <th>Date Plan</th>
                                            <th>Owner</th>
                                            <th>Plan Discussion</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($plans as $plan)
                                            <tr>
                                                <td>{{$plan->id}}</td>
                                                <td><a href="{{route('client.plans', $plan->client->id)}}">{{$plan->client->name}}</a></td>
                                                <td>{{$plan->date_written}}</td>
                                                <td>{{$plan->date_plan}}</td>
                                                <td>{{$plan->employee->name}}</td>
                                                <td>{{Str::limit($plan->plan_discussion, 50)}}</td>
                                                <td>{{$plan->created_at}}</td>
                                                <td>{{$plan->updated_at}}</td>
                                                <td></td>
                                                {{--                                <td>--}}
                                                {{--                                    <form action="{{route('employee.destroy', $employee->id)}}" method="post"--}}
                                                {{--                                          enctype="multipart/form-data">--}}
                                                {{--                                        @csrf--}}
                                                {{--                                        @method('DELETE')--}}
                                                {{--                                        <button type="submit" class="btn btn-danger">Delete</button>--}}
                                                {{--                                    </form>--}}
                                                {{--                                </td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
    @section('scripts')
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
