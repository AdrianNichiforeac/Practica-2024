<x-admin-master>
    @section('content')
        <div class="row">
            @if(session()->has('permission-deleted'))
                <div class="alert alert-danger">
                    {{session('permission-deleted')}}
                </div>
            @endif
        </div>

        <div class="row" style="padding: 15px">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-head style-primary">
                        <header>Permissions</header>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{$permission->id}}</td>
                                        <td>
                                            <a href="{{route('permission.edit',$permission->id)}}">{{$permission->name}}</a>
                                        </td>
                                        <td>{{$permission->slug}}</td>
                                        <td>
                                            <form method="post"
                                                  action="{{route('permission.destroy', $permission->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{route('permission.edit',$permission->id)}}"><button type="submit" class="btn btn-primary">Edit</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-offset-0 col-md-4" >
                <form class="form" method="post" action="{{route('permission.store')}}">
                    @csrf
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Add Permissions</header>
                        </div>
                        <div class="card-body floating-label">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name"
                                               class="form-control @error('name')is-invalid @enderror">
                                        <label for="Name">Name</label>
                                        <div>
                                            @error('name')
                                            <span><strong>{{$message}}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end .card-body -->
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Submit</button>
                            </div>
                        </div>
                    </div><!--end .card -->
                </form>
            </div><!--end .col -->
        </div>
    @endsection
</x-admin-master>
