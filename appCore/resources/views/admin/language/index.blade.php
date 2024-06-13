@extends('layouts.admin')
@section('content')
    <div class="main-container">
        <!-- Page header start -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Languages</li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewLanguage"> <i class="fa fa-plus"></i> Adaugă limbă </button>

                        {{-- Modal Add New Admin --}}
                        <div class="modal fade" id="addNewLanguage" tabindex="-1" role="dialog" aria-labelledby="addNewLanguageLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addNewLanguageLabel">Adăugă limbă</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row gutters" method="post" enctype="multipart/form-data" action="{{route('language.store')}}" id="add_form">
                                            @csrf
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_new">Locale:</label>
                                                    <input type="text" class="form-control" name="locale" id="locale_new" value="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_new">Language:</label>
                                                    <input type="text" class="form-control" name="language" id="language_new" value="">
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
                                        <th>Locale</th>
                                        <th>Language</th>
                                        <th>Acțiuni</th>
                                    </tr>
                                    </thead>
                                    @foreach($language as $lang)
                                        <tbody class="admin-body">
                                        <tr>
                                            <td>{{$lang->locale}}</td>
                                            <td>{{$lang->language}}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#editContact_{{$lang->id}}"><i class="icon-mode_edit admin" ></i></a>
                                                <a class="btn btn-danger btn-sm" href="#" onclick="DeleteConfirm('{{route('language.destroy', $lang->id)}}');" data-target="#deleteContact_{{$lang->id}}">  <i class="icon-delete delete" ></i></a>
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
                @foreach($language as $lang)

                    {{--Edit Modal Contact--}}
                    <div class="modal fade" id="editContact_{{$lang->id}}" tabindex="-1" role="dialog" aria-labelledby="editContactLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editContactLabel">Editează limba {{$lang->language}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="row gutters"  method="post" enctype="multipart/form-data"  action="{{route('language.update', $lang->id)}}" id="edit_form_{{$lang->id}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_{{$lang->id}}">Locale:</label>
                                                <input type="text" class="form-control" name="locale" id="name_{{$lang->id}}" value="{{$lang->locale}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_{{$lang->id}}">Language:</label>
                                                <input type="text" class="form-control" name="language" id="username_{{$lang->id}}" value="{{$lang->language}}">
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
                                        <button onclick="$('#edit_form_{{$lang->id}}').submit();" type="submit" class="btn btn-link success btn-block">Salvează</button>
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

