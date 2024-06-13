@extends('layouts.admin')
@section('content')
    <div class="main-container">
        <!-- Page header start -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Info</li>
                <li class="breadcrumb-item">Galerie</li>
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
                            <h5 class="modal-title" id="addNewPartnerLabel">Adăugare Galerie</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="row gutters" method="post" enctype="multipart/form-data" action="{{route('gallery_posts.store')}}" id="add_form">
                                @csrf
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name_new">Nume:</label>
                                        <input type="text" class="form-control" name="name"  value="">
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
                                        <th>Active</th>
                                        <th>Acțiuni</th>
                                    </tr>
                                    </thead>
                                    @foreach($gallery as $gallery_item)
                                        <tbody class="admin-body">
                                        <tr>
                                            <td>{{$gallery_item->name}}</td>
                                            <td>
                                                @if ($gallery_item->active)
                                                    <a href="{{route('gallery_posts.change_status', [$gallery_item->id, 0])}}"><i class="fa fa-plus feat" ></i></a>
                                                @else
                                                    <a href="{{route('gallery_posts.change_status', [$gallery_item->id, 1])}}"><i class="fa fa-minus feat" ></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{route('gallery_posts.edit', $gallery_item->id)}}"><i class="icon-mode_edit admin" ></i></a>
                                                <a class="btn btn-danger btn-sm" href="#" onclick="DeleteConfirm('{{route('gallery_posts.destroy', $gallery_item->id)}}');" data-target="#deleteContact_{{$gallery_item->id}}">  <i class="icon-delete delete" ></i></a>
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