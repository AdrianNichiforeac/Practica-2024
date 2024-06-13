@extends('layouts.admin')
@section('content')
    <div class="main-container">
        <!-- Page header start -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{$gallery->name}}</li>
            </ol>
        </div>
        <!-- Page header end -->

        <div class="content-wrapper">
            @include('admin.components.alerts')
            <div class="row">
                <div class="col-md-8">
                    <form class="row gutters" method="post" enctype="multipart/form-data" action="{{route('gallery_posts.update',['id' => $gallery->id] )}}" id="add_form">
                        @csrf
                        @method('PUT')
                        <div class="card" style="width: 100%">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="alert alert-info" role="alert">
                                        <i class="icon-info1"></i>click pe imagine pentru a modifica
                                    </div>
                                    @if ($gallery->picture)
                                        <img class="click-image" id="general_image"  src="{{asset('storage/'.$gallery->picture)}}" alt="{{$gallery->name}}" onclick="$('#uploadPhoto').click();"/>
                                    @else
                                        <img class="click-image"  id="general_image" src="/images/default-banner.jpg" alt="{{$gallery->name}}" onclick="$('#uploadPhoto').click();"/>
                                    @endif
                                    <div class="form-group m-0" style="display: none">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="picture" class="custom-file-input" id="uploadPhoto">
                                                <label class="custom-file-label" for="uploadPhoto" aria-describedby="uploadPhotoAddon"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="nav-tabs-container">
                                        <ul class="nav nav-tabs" id="language" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="en" data-toggle="tab" href="#english" role="tab" aria-controls="english" aria-selected="true">RO</a>
                                            </li>
                                           {{-- <li class="nav-item">
                                                <a class="nav-link" id="ro" data-toggle="tab" href="#romana" role="tab" aria-controls="romana" aria-selected="false">RO</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="ru" data-toggle="tab" href="#russia" role="tab" aria-controls="russia" aria-selected="false">RU</a>
                                            </li> --}}
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade active show" name="en" id="english" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="en_name">Nume(RO):</label>
                                                            <input type="text" class="form-control"  name="en_name"  type="text"  id="en_name" value="{{ $gallery->translate('en')->name ?? ''}}">
                                                        </div>
                                                    </div>
                                                </div>
                                              {{--  <div class="tab-pane fade" id="romana" name="ro" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="ro_name">Nume(RO):</label>
                                                                <input type="text" class="form-control"  name="ro_name"  type="text"  id="ro_name" value="{{ $gallery->translate('ro')->name ?? ''}}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="russia" name="ru" role="tabpanel" aria-labelledby="contact-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="ru_name">Nume(RU):</label>
                                                                <input type="text" class="form-control"  name="ru_name"  type="text"  id="ru_name" value="{{ $gallery->translate('ru')->name ?? ''}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{route('gallery_posts.index')}}" class="btn-link">Renunță</a>
                                        <button type="submit" class="btn btn-primary btn-sm">Salvează</button>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        @include('admin.components.gallery.gallery', ['parent' => $gallery, 'type' => "GalleryPost"])
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- Gallery JS -->
            <script src="/vendor/gallery/baguetteBox.js" async></script>
            <script src="/vendor/gallery/plugins.js" async></script>
            <script src="/vendor/gallery/custom-gallery.js" async></script>
            <script>
                /**
                 * Initiate Ajax request when add image
                 */
                $('#uploadPhoto').change(function(){
                    store_image_general()
                })

                /**
                 * Store image to gallery and update gallery content
                 */
                function store_image_general(){
                    var fileInput = document.getElementById('uploadPhoto');
                    var dataForm = new FormData();
                    var file = fileInput.files[0];
                    dataForm.append('picture', file);

                    $.ajax({
                        url: "{{route('gallery_posts.store_image_general', $gallery->id)}}",
                        type:"POST",
                        headers: {
                            'X-CSRF-Token': "{{ csrf_token() }}"
                        },
                        data: dataForm,
                        success:function(response){
                            console.log(response);
                            $('#general_image').attr('src', response);
                        },
                        error:function(response){
                            console.log(response);
                        },
                        processData: false,
                        contentType: false,
                    });
                }
            </script>
@endsection
