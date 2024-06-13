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
                                <header><i class="fa fa-fw fa-users"></i>Editare client</header>
                            </div><!--end .card-head -->
                            <form class="form" method="post" action="{{route('client.update', $client->id)}}">
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
                                                           value="{{$client->name}}">
                                                    <label for="name">Nume</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">

                                                    <select name="region_id" id="region_id" class="form-control">
                                                        <option selected
                                                                value="{{$client->region->id}}">{{$client->region->name}}</option>
                                                        @foreach($regions as $region)
                                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="region_id">Regiune</label>
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
                                                           aria-describedby=""
                                                           value="{{$client->contact_person}}">
                                                    <label for="contact_person">Persoană de contact</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text"
                                                           name="phone"
                                                           class="form-control"
                                                           id="phone"
                                                           aria-describedby=""
                                                           value="{{$client->phone}}">
                                                    <label for="phone">Telefon</label>
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
                                                           aria-describedby=""
                                                           value="{{$client->total_surface}}">
                                                    <label for="total_surface">Suprafață totală</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text"
                                                           name="managed_surface"
                                                           class="form-control"
                                                           id="managed_surface"
                                                           aria-describedby=""
                                                           value="{{$client->managed_surface}}">
                                                    <label for="managed_surface">Suprafață prelucrată</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea
                                                        name="description"
                                                        id="description"
                                                        rows="5" class="form-control">{{$client->description}}</textarea>
                                                    <label for="description">Descriere</label>
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
