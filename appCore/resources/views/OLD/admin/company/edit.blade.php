<x-admin-master>
    @section('content')
        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Companie</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-building"></i>Editare informație companie</header>
                            </div><!--end .card-head -->
                            <form class="form" method="post" action="{{route('company.update')}}">
                                @csrf
                                @method('PUT')
                                <div class="card-body style-default-bright">
                                    <div class="card-body floating-label">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">

                                                    <input type="text"
                                                           name="name"
                                                           class="form-control"
                                                           id="name"
                                                           aria-describedby=""
                                                           value="{{$company->name ?? ''}}">
                                                    <label for="name">Nume companie</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="about">Despre {{$company->name ?? ''}}</label>
                                                    <textarea name="about" id="about" class="form-control control-12-rows ckeditor" >{{$company->about ?? ''}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="name">Organigrama</label>
                                                    <textarea name="organigrama" id="organigrama" class="form-control control-12-rows ckeditor" >{{$company->organigrama ?? ''}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div><!--end .card-body -->
                                    <div class="card-actionbar">
                                        <div class="card-actionbar-row">
                                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Salvează</button>
                                        </div>
                                    </div>
                                </div><!--end .card -->
                            </form><!--end .card-body -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
</x-admin-master>
