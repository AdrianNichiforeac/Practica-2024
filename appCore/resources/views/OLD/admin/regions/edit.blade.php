<x-admin-master>
    @section('content')

        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Regions</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i>Editează regiunea</header>
                            </div><!--end .card-head -->
                            <form class="form" method="post" action="{{route('region.update', $region->id)}}">
                                @csrf
                                <div class="card-body style-default-bright">
                                    <div class="card-body floating-label">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" id="name" aria-describedby="" value="{{$region->name}}">
                                                    <label for="Name">Name</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                    <div class="card-actionbar">
                                        <div class="card-actionbar-row">
                                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Trimite</button>
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
