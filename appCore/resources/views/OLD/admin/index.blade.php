<x-admin-master>
    @section('content')
        @if(auth()->user())
            <section>
                <div class="section-header">
                    <ol class="breadcrumb">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-12">
                            <style>
                                .card .tab-pane{
                                    min-height: 250px;
                                }
                            </style>
                            <div class="col-md-3">
                                <div class="card style-default-light">
                                    <div class="card-body tab-content style-default-bright">
                                        <div class="tab-pane active">
                                            <h1><i class="fa fa-fw fa-building text-accent"></i> Companie</h1>
                                            <a href="{{route('company.about')}}" type="button" class="btn btn-block ink-reaction btn-info">Despre</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">Organigrama</a>
                                            <a href="{{route('partners')}}" type="button" class="btn btn-block ink-reaction btn-info">Parteneri</a>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div>

                            <div class="col-md-3">
                                <div class="card style-default-light">
                                    <div class="card-body tab-content style-default-bright">
                                        <div class="tab-pane active">
                                            <h1><i class="fa fa-fw fa-users text-accent"></i> Resurse umane</h1>
                                            <a href="{{route('employee.index')}}" type="button" class="btn btn-block ink-reaction btn-info">Angajați</a>
                                            <a href="{{route('admin.home')}}" type="button" class="btn btn-block ink-reaction btn-info">Administratori</a>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div>

                            <div class="col-md-3">
                                <div class="card style-default-light">
                                    <div class="card-body tab-content style-default-bright">
                                        <div class="tab-pane active">
                                            <h1><i class="fa fa-fw fa-key text-accent"></i> Departamente</h1>
                                            <a href="{{route('employee.index')}}" type="button" class="btn btn-block ink-reaction btn-info">Departamentul vînzări</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">Departamentul contabilitate</a>
                                            <a href="{{route('partners')}}" type="button" class="btn btn-block ink-reaction btn-info">Departamentul Juridic</a>
                                            <a href="{{route('partners')}}" type="button" class="btn btn-block ink-reaction btn-info">Departamentul TS&NP</a>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div>

                            <div class="col-md-3">
                                <div class="card style-default-light">
                                    <div class="card-body tab-content style-default-bright">
                                        <div class="tab-pane active">
                                            <h1><i class="fa fa-fw fa-calendar text-accent"></i> Agendă</h1>
                                            <a href="{{route('employee.index')}}" type="button" class="btn btn-block ink-reaction btn-info">RAPORT</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">Plan vînzări</a>
                                            <a href="{{route('partners')}}" type="button" class="btn btn-block ink-reaction btn-info">Clienți potențiali</a>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div>

                            <div class="col-md-3">
                                <div class="card style-default-light">
                                    <div class="card-body tab-content style-default-bright">
                                        <div class="tab-pane active">
                                            <h1><i class="fa fa-fw fa-car text-accent"></i> Monitorizare flotă</h1>
                                            <a href="{{route('employee.index')}}" type="button" class="btn btn-block ink-reaction btn-info">Automobile</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">GPS</a>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div>

                            <div class="col-md-3">
                                <div class="card style-default-light">
                                    <div class="card-body tab-content style-default-bright">
                                        <div class="tab-pane active">
                                            <h1><i class="fa fa-fw fa-road text-accent"></i> Logistică&Transport</h1>
                                            <a href="{{route('employee.index')}}" type="button" class="btn btn-block ink-reaction btn-info">Transport</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">Istoric</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">Anvelope</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">Asigurare</a>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div>

                            <div class="col-md-3">
                                <div class="card style-default-light">
                                    <div class="card-body tab-content style-default-bright">
                                        <div class="tab-pane active">
                                            <h1><i class="fa fa-fw fa-archive text-accent"></i> Depozit</h1>
                                            <a href="{{route('employee.index')}}" type="button" class="btn btn-block ink-reaction btn-info">Transport</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">Produse</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">Price List</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">Stoc</a>
                                            <a href="{{route('company.organigrama')}}" type="button" class="btn btn-block ink-reaction btn-info">Inventariere</a>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endsection
</x-admin-master>
