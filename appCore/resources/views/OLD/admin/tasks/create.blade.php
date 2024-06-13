<x-admin-master>
    @section('content')
        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Tasks</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i> Create task</header>
                            </div><!--end .card-head -->
                            <form class="form" method="post" action="{{route('task.store')}}">
                                @csrf
                                <div class="card-body style-default-bright">
                                    <div class="card-body floating-label">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" name="title" class="form-control" id="title" aria-describedby="">
                                                    <label for="title">Title</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                                                    <label for="description">Textarea</label>
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
