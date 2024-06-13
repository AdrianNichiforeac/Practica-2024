@extends('layouts.admin')
@section('content')
    <div class="main-container">
        <!-- Page header start -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Constante</li>
            </ol>
        </div>
        <!-- Page header end -->

        <div class="content-wrapper pt-0">

            @include('admin.components.alerts')

            {{--Add admins start --}}
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <!-- Button trigger modal -->
                        <div class="col-md-4 text-left">
                            <button type="button" class="btn btn-primary ml-5 mt-4" data-toggle="modal"
                                    data-target="#addNewTranslate"><i class="fa fa-plus"></i> Adaugă constanta
                            </button>
                        </div>

                        <form class="col-md-8 text-right">
                            <div class="row">
                                <div class="col-md-2 offset-md-5">
                                    <div class="form-group m-2">
                                        <p class="m-0 px-3 text-center">
                                            Caută după ”Key”
                                        </p>
                                        <input type="text" class="form-control" name="key"
                                               value="{{Request::get('key')}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group m-2">
                                        <p class="m-0 px-3 text-center">
                                            Caută după conținut
                                        </p>
                                        <input type="text" class="form-control" name="text"
                                               value="{{Request::get('text')}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <p class="m-1">&nbsp</p>
                                    <button type="submit"
                                            class="btn btn-primary">Caută</button>
                                    <a href="{{route('translate.index')}}"
                                       class="btn btn-info">Resetează</a>

                                </div>
                            </div>
                        </form>

                        {{-- Modal Add New Admin --}}
                        <div class="modal fade" id="addNewTranslate" tabindex="-1" role="dialog"
                             aria-labelledby="addNewTranslateLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addNewTranslate">Adăugă constanta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row gutters" method="post" enctype="multipart/form-data"
                                              action="{{ route('translate.insert') }}" id="add_form">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_new">Group:</label>
                                                    <input type="text" class="form-control" name="group" id="group"
                                                           value="{{old("group")}}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_new">Key:</label>
                                                    <input type="text" class="form-control" name="key" id="key"
                                                           value="{{old("key")}}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_new">English:</label>
                                                    <input type="text" class="form-control" name="en" id="en"
                                                           value="{{old("en")}}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_new">Română:</label>
                                                    <input type="text" class="form-control" name="ro" id="ro"
                                                           value="{{old("ro")}}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name_new">Ru:</label>
                                                    <input type="text" class="form-control" name="ru" id="ru"
                                                           value="{{old("ru")}}">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer custom">
                                        <div class="left-side">
                                            <button type="button" class="btn btn-link danger btn-block"
                                                    data-dismiss="modal">Renunță
                                            </button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="right-side">
                                            <button type="button" onclick="$('#add_form').submit();"
                                                    class="btn btn-link success btn-block">Salvează
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END Modal Add New Admin--}}
                    </div>
                </div>
            </div>

            <div class="row gutters">
                <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="mt-1 mb-1">
                                    <div class="d-flex justify-content-center">
                                        {{ $constantes->appends($data)->links() }}
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped">
                                    <thead class="admin-head">
                                    <tr>
                                        <th>{{__("key")}}</th>
                                        <th>(EN)</th>
                                        <th>(RO)</th>
                                        <th>(RU)</th>
                                        <th style="text-align: center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="admin-body">
                                    @foreach($constantes as $const)
                                        <tr>
                                            <td>{{$const->group ?? ''}}.{{$const->key ?? ''}}</td>
                                            <td>{{$const->text['en'] ?? ''}}</td>
                                            <td>{{$const->text['ro'] ?? ''}}</td>
                                            <td>{{$const->text['ru'] ?? ''}}</td>
                                            <td nowrap="">
                                                <a class="btn btn-primary btn-sm" href="#" data-toggle="modal"
                                                   data-target="#editContact_{{$const->id}}"><i
                                                        class="icon-mode_edit admin"></i></a>
                                                <a class="btn btn-danger btn-sm" href="#"
                                                   onclick="DeleteConfirm('{{route('translate.destroy', $const->id)}}');"
                                                   data-target="#deleteContact_{{$const->id}}"> <i
                                                        class="icon-delete delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-1 mb-1">
                                    <div class="d-flex justify-content-center">
                                        {{ $constantes->appends($data)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row gutters">
                {{-- Modal edit const --}}
                @foreach($constantes as $const)
                    <div class="modal fade" id="editContact_{{$const->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="editContactLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form class="row gutters" method="post" enctype="multipart/form-data"
                                  action="{{ route('translate.update',$const->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editContactLabel">Editează constanta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_new">Group:</label>
                                                <input type="text" class="form-control" name="group"
                                                       id="group_{{$const->id}}" value="{{$const->group}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_new">Key:</label>
                                                <input type="text" class="form-control" name="key"
                                                       id="key_{{$const->id}}" value="{{$const->key}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_new">English:</label>
                                                <input type="text" class="form-control" name="en" id="en_{{$const->id}}"
                                                       value="{{$const->text['en']}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_new">Română:</label>
                                                <input type="text" class="form-control" name="ro" id="ro_{{$const->id}}"
                                                       value="{{$const->text['ro']}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_new">Russia:</label>
                                                <input type="text" class="form-control" name="ru" id="ru_{{$const->id}}"
                                                       value="{{$const->text['ru']}}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer custom">
                                        <div class="left-side">
                                            <button type="button" class="btn btn-link danger btn-block"
                                                    data-dismiss="modal">Renunță
                                            </button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="right-side">
                                            <button type="submit" class="btn btn-link success btn-block">Salvează
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
                {{-- END Modal Aedit const--}}
            </div>
        </div>
    </div>
@endsection

