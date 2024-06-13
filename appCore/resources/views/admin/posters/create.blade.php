@extends('layouts.admin')
@section('content')
    <div class="main-container">
        <!-- Page header start -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Info</li>
                <li class="breadcrumb-item"><a href="{{route('posters.index')}}">Banners</a></li>
                <li class="breadcrumb-item">Add</li>
            </ol>
        </div>
        <!-- Page header end -->

        <div class="content-wrapper">
            @include('admin.components.alerts')
            <div class="row">
                <div class="col-md-8">
                    <form method="post" enctype="multipart/form-data" action="{{route('posters.store')}}" id="add_form">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info" role="alert">
                                            <i class="icon-info1"></i>click pe imagine pentru a modifica
                                        </div>
                                        <img class="click-image" src="/images/default-banner.jpg" alt="banner_photo" onclick="$('#uploadPhoto').click();"/>
                                        <div class="form-group m-0" style="display: none">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="picture" class="custom-file-input" id="uploadPhoto">
                                                    <label class="custom-file-label" for="uploadPhoto" aria-describedby="uploadPhotoAddon"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_new">Nume:</label>
                                            <input type="text" class="form-control" name="name" id="name_news" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" class="form-control"  name="link" id="link-name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name_new">Descriere:</label>
                                            <input type="text" class="form-control" name="description" id="description_banner" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{route('posters.index')}}" class="btn-link">Renunță</a>
                                <button type="submit" class="btn btn-primary btn-sm">Adaugă</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
