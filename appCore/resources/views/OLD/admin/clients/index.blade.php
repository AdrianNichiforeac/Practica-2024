<x-admin-master>
@section('content')
    <!-- BEGIN CONTENT-->

        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Clients</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i> Lista clienți</header>
                            </div><!--end .card-head -->
                            <div class="card-body style-default-bright">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Contact Person</th>
                                            <th>Phone</th>
                                            <th>Region</th>
                                            <th>Total Surface</th>
                                            <th>Managed Surface</th>
                                            <th>Description</th>
                                            <th>Plans</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Contact Person</th>
                                            <th>Phone</th>
                                            <th>Region</th>
                                            <th>Total Surface</th>
                                            <th>Managed Surface</th>
                                            <th>Description</th>
                                            <th>Plans</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{$client->id}}</td>
                                                <td>{{$client->name}}</td>
                                                <td>{{$client->contact_person}}</td>
                                                <td>{{$client->phone}}</td>
                                                <td>{{$client->region->name}}</td>
                                                <td>{{$client->total_surface}}</td>
                                                <td>{{$client->managed_surface}}</td>
                                                <td>{{$client->description}}</td>
                                                <td>
                                                    <a href="{{route('client.plans', $client->id)}}">
                                                        <button type="submit" class="btn btn-accent">Plans</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('client.edit', $client->id)}}">
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{route('client.destroy', $client->id)}}"
                                                          method="post"
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
