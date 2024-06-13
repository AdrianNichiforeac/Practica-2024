<x-admin-master>
    @section('content')

        <div class="row" style="padding: 15px">
            <div class="col-lg-offset-0 col-md-6" >
                <form class="form" method="post" action="{{route('employee.profile.update', $employee)}}">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Editare profil : {{$employee->name}} {{$employee->surname}}</header>
                        </div>
                        <div class="card-body floating-label">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control

                                            @error('name')
                                                  is-invalid
                                            @enderror"
                                               name="name"
                                               id="name"
                                               value="{{$employee->name}}">

                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        <label for="Name">Nume</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control
                                            @error('surname')
                                                   is-invalid
                                            @enderror"
                                               name="surname" id="surname" value="{{$employee->surname}}">
                                        @error('surname')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        <label for="surname">Prenume</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                               name="login" id="login" value="{{$employee->login}}">
                                        @error('login')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                        <label for="login">login</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password-confirmation" id="confirmation">
                                        <label for="confirmation">Confirm Password</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <img class="img-profile rounded-circle" height="60px" width="60px"
                                     src="{{$employee->photo}}">

                            </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file"
                                       name="logo"
                                       class="form-control-file"
                                       id="logo">
                            </div>
                        </div><!--end .card-body -->
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Trimite</button>
                            </div>
                        </div>
                    </div><!--end .card -->
                </form>
            </div><!--end .col -->

            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-head style-primary">
                        <header>Roles</header>
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
                                @foreach($roles as $role)
                                    <tr>
                                        <td><input type="checkbox" readonly style="pointer-events: none"
                                                   @foreach($employee->roles as $employee_role)
                                                   @if($employee_role->slug == $role->slug)
                                                   checked
                                                @endif
                                                @endforeach>
                                        </td>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <td>
                                            <form action="{{route('employee.role.attach', $employee)}}" method="post">
                                                @method('PUT')
                                                @csrf

                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-primary"
                                                        @if($employee->roles->contains($role))
                                                        disabled
                                                    @endif>Attach
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('employee.role.detach', $employee)}}" method="post">
                                                @method('PUT')
                                                @csrf

                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-danger"
                                                        @if(!$employee->roles->contains($role))
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
            </div>
        </div>
    @endsection
</x-admin-master>

