<x-admin-master>
    @section('content')


        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Regions</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i> Listă regiuni</header>
                            </div><!--end .card-head -->
                            <div class="card-body style-default-bright">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($regions as $region)
                                            <tr>
                                                <td>{{$region->id}}</td>
                                                <td><a href="{{route('region.edit', $region->id)}}">{{$region->name}}</a></td>
                                                <td>{{$region->created_at}}</td>
                                                <td>{{$region->updated_at}}</td>
                                                <td>
                                                    <form action="{{route('region.destroy', $region->id)}}" method="post"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="{{route('region.edit', $region->id)}}"><button type="submit" class="btn btn-primary">Edit</button></a>
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
</x-admin-master>
