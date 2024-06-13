<x-admin-master>
    @section('content')

        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Clients</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i>Adaugare client</header>
                            </div><!--end .card-head -->
                            <form class="form" method="post" action="{{route('client.store')}}">
                                @csrf
                                <div class="card-body style-default-bright">
                                    <div class="card-body floating-label">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">

                                                    <input type="text"
                                                           name="name"
                                                           class="form-control"
                                                           id="name"
                                                           aria-describedby="">
                                                    <label for="name">Name</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <select name="region_id" id="region_id" class="form-control">
                                                        <option selected></option>
                                                        @foreach($regions as $region)
                                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="region_id">Region</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text"
                                                           name="contact_person"
                                                           class="form-control"
                                                           id="contact_person"
                                                           aria-describedby="">
                                                    <label for="contact_person">Contact Person</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text"
                                                           name="phone"
                                                           class="form-control"
                                                           id="phone"
                                                           aria-describedby="">
                                                    <label for="phone">Phone</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">

                                                    <input type="text"
                                                           name="total_surface"
                                                           class="form-control"
                                                           id="total_surface"
                                                           aria-describedby="">
                                                    <label for="total_surface">Total Surface</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text"
                                                           name="managed_surface"
                                                           class="form-control"
                                                           id="managed_surface"
                                                           aria-describedby="">
                                                    <label for="managed_surface">Managed Surface</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea
                                                        name="description"
                                                        id="description"
                                                        rows="5" class="form-control"></textarea>
                                                    <label for="description">Description</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                    <div class="card-actionbar">
                                        <div class="card-actionbar-row">
                                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Adaugă</button>
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
