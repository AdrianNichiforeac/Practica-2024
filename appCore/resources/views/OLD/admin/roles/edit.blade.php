<x-admin-master>
    @section('content')
        @if(session()->has('role-updated'))
            <div class="alert alert-success">
                {{session('role-updated')}}
            </div>
        @endif

        <div class="row" style="padding: 15px">
            <div class="col-lg-offset-0 col-md-4" >
                <form class="form" method="post" action="{{route('role.update',$role->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Edit Role: {{$role->name}}</header>
                        </div>

                        <div class="card-body floating-label">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" value="{{$role->name}}">
                                    <label for="name">Name</label>
                                </div>
                            </div>

                        </div>
                        </div>
                        <!--end .card-body -->
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update</button>
                            </div>
                        </div>
                    </div><!--end .card -->
                </form>
            </div>

            <div class="col-md-6">
                @if($permissions->isNotEmpty())
                <div class="card shadow mb-4">
                    <div class="card-head style-primary">
                        <header>Permissions</header>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td><input type="checkbox" readonly style="pointer-events: none"
                                                   @foreach($role->permissions as $role_permission)
                                                   @if($role_permission->slug == $permission->slug)
                                                   checked
                                                @endif
                                                @endforeach>
                                        </td>
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->slug}}</td>
                                        <td>
                                            <form action="{{route('role.permission.attach', $role)}}" method="post">
                                                @method('PUT')
                                                @csrf

                                                <input type="hidden" name="permission" value="{{$permission->id}}">
                                                <button class="btn btn-primary"
                                                        @if($role->permissions->contains($permission))
                                                        disabled
                                                    @endif>Attach
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('role.permission.detach', $role)}}" method="post">
                                                @method('PUT')
                                                @csrf

                                                <input type="hidden" name="permission" value="{{$permission->id}}">
                                                <button class="btn btn-danger"
                                                        @if(!$role->permissions->contains($permission))
                                                        disabled
                                                    @endif>Detach
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    @endsection
</x-admin-master>
