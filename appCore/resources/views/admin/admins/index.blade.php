@extends('layouts.admin')
@section('content')
    <div class="main-container">
        <!-- Page header start -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Administratori</li>
            </ol>
        </div>
        <!-- Page header end -->

        <div class="content-wrapper">

            @include('admin.components.alerts')

            {{--Add admins start --}}
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-left mb-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewPartner"> <i class="fa fa-plus"></i> Adaugă administrator </button>

                        {{-- Modal Add New Admin --}}
                        <div class="modal fade" id="addNewPartner" tabindex="-1" role="dialog" aria-labelledby="addNewPartnerLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addNewPartnerLabel">Adăugare administrator</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row gutters" method="post" enctype="multipart/form-data" action="{{route('admins.store')}}" id="add_form">
                                            @csrf
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_new">Nume:</label>
                                                    <input type="text" class="form-control" name="name" id="name_new" value="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_new">Login:</label>
                                                    <input type="text" class="form-control" name="username" id="username_new" value="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="link_new">Parola:</label>
                                                    <input type="password" class="form-control" name="password" id="password_new" value="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer custom">
                                        <div class="left-side">
                                            <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Renunță</button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="right-side">
                                            <button type="button" onclick="$('#add_form').submit();" class="btn btn-link success btn-block">Salvează</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END Modal Add New Admin--}}
                    </div>
                </div>
            </div>
            {{--Add Admin end --}}
            <div class="row gutters">
                <div class="col-xs-12 col-lg-8 col-md-8 col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="admin-head">
                                    <tr>
                                        <th>Nume</th>
                                        <th>Login</th>
                                        <th>Active</th>
                                        <th>Acțiuni</th>
                                    </tr>
                                    </thead>
                                    @foreach($admins as $admin)
                                        <tbody class="admin-body">
                                        <tr>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->username}}</td>
                                            <td>
                                                @if ($admin->active)
                                                    <a href="{{route('admins.change_status', [$admin->id, 0])}}"><i class="fa fa-minus feat" ></i></a>
                                                @else
                                                    <a href="{{route('admins.change_status', [$admin->id, 1])}}"><i class="fa fa-plus feat" ></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editContact_{{$admin->id}}"><i class="icon-mode_edit admin" ></i></a>
                                                <a class="btn btn-danger btn-sm" onclick="DeleteConfirm('{{route('admins.destroy', $admin->id)}}');" data-target="#deleteContact_{{$admin->id}}">  <i class="icon-delete delete" ></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row gutters">
                @foreach($admins as $admin)

                    {{--Edit Modal Contact--}}
                    <div class="modal fade" id="editContact_{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="editContactLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editContactLabel">Editează administratorul {{$admin->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="row gutters"  method="post" enctype="multipart/form-data"  action="{{route('admins.update', $admin->id)}}" id="edit_form_{{$admin->id}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_{{$admin->id}}">Nume:</label>
                                                <input type="text" class="form-control" name="name" id="name_{{$admin->id}}" value="{{$admin->name}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_{{$admin->id}}">Login:</label>
                                                <input type="text" class="form-control" name="username" id="username_{{$admin->id}}" value="{{$admin->username}}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_{{$admin->id}}">Parola:</label>
                                                <input type="password" class="form-control" name="password" id="password_{{$admin->id}}" value="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer custom">
                                    <div class="left-side">
                                        <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Renunță</button>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="right-side">
                                        <button onclick="$('#edit_form_{{$admin->id}}').submit();" type="submit" class="btn btn-link success btn-block">Salvează</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--END Edit Modal Contact--}}
                @endforeach
            </div>
        </div>
    </div>
@endsection

