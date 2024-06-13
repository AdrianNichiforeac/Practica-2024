<x-admin-master>
    @section('content')
        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Despre {{$company->name ?? ''}}</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {!! $company->about ?? '' !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
</x-admin-master>
