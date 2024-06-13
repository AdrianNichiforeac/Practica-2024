<x-admin-master>
    @section('content')
        <div class="row" style="padding: 15px">
            <div class="col-lg-offset-0 col-md-8" >
                <form class="form" method="post" enctype="multipart/form-data" action="{{route('partners.store')}}">
                    @csrf
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Create Partner</header>
                        </div>
                        <div class="card-body floating-label">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="Name">
                                        <label for="Name">Nume</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="link" id="Link">
                                        <label for="Link">Link</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="logo">Logotip</label>
                                <input type="file"
                                       name="logo"
                                       class="form-control-file"
                                       id="logo">
                            </div>
                        </div><!--end .card-body -->
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Salvează</button>
                            </div>
                        </div>
                    </div><!--end .card -->
                </form>

            </div><!--end .col -->
        </div>
    @endsection

</x-admin-master>
