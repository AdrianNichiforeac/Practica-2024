<x-admin-master>
    @section('content')
        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Organigrama</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! $company->organigrama ?? '' !!}
                    </div>

                </div>
            </div>
        </section>
    @endsection
</x-admin-master>
