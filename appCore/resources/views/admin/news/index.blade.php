@extends('layouts.admin')
@section('content')
    <div class="main-container">
        <!-- Page header start -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Info</li>
                <li class="breadcrumb-item">Noutăți</li>
            </ol>
        </div>
        <!-- Page header end -->

        <div class="content-wrapper">

            @include('admin.components.alerts')

            {{--Add admins start --}}
            <div class="row gutters">
                <div class="col-xs-12 col-lg-8">
                    <div class="text-left mb-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewPartner"> <i class="fa fa-plus"></i> Adaugă</button>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="addNewPartner" tabindex="-1" role="dialog" aria-labelledby="addNewPartnerLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewPartnerLabel">Adăugare Noutate</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="row gutters" method="post" enctype="multipart/form-data" action="{{route('news.store')}}" id="add_form">
                                @csrf
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name_new">Nume:</label>
                                        <input type="text" class="form-control" name="name"  value="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name_new">Data:</label>
                                        <input type="text" class="form-control datepicker" name="data" placeholder="YYYY-MM-DD"  id="date-formatting" value="" autocomplete="off">
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

            <div class="row gutters">
                <div class="col-xs-12 col-lg-8 col-md-8 col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="admin-head">
                                    <tr>
                                        <th>Nume</th>
                                        <th>Părinte</th>
                                        <th>Data</th>
                                        <th>Active</th>
                                        <th>Acțiuni</th>
                                    </tr>
                                    </thead>
                                    @foreach($news as $news_single)
                                        <tbody class="admin-body">
                                        <tr>
                                            <td style="text-align: left">{{$news_single->name}}</td>
                                            <td style="text-align: left">{{$news_single->page['name']}}</td>
                                            <td>{{$news_single->data}}</td>
                                            <td>
                                                @if ($news_single->active)
                                                    <a href="{{route('news.change_status', [$news_single->id, 0])}}"><i class="fa fa-plus feat" ></i></a>
                                                @else
                                                    <a href="{{route('news.change_status', [$news_single->id, 1])}}"><i class="fa fa-minus feat" ></i></a>
                                                @endif
                                            </td>
                                            <td style="min-width: 100px;">
                                              <a class="btn btn-primary btn-sm" href="{{route('news.edit', $news_single->id)}}"><i class="icon-mode_edit admin" ></i></a>
                                                <a class="btn btn-danger btn-sm" href="#" onclick="DeleteConfirm('{{route('news.destroy', $news_single->id)}}');" data-target="#deleteContact_{{$news_single->id}}">  <i class="icon-delete delete" ></i></a>
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
        </div>
    </div>
@endsection


