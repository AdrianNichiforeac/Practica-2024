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
                    <div class="col-md-10">
                        <div class="card card-bordered style-primary">
                            <div class="card-head">
                                <header><i class="fa fa-fw fa-users"></i>Client <b><u>{{$client->name}}</u></b>: All plans</header>
                                <div class="btn-group">
                                    <a href="{{route('client.plan.create', $client->id)}}" class="btn btn-accent-dark"><i><b>Add
                                                Plan</b></i></a>
                                </div>
                            </div><!--end .card-head -->

                            <div class="card-body style-default-bright">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Date Written</th>
                                            <th>Date Plan</th>
                                            <th>Owner</th>
                                            <th>Plan Discussion</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Client</th>
                                            <th>Date Written</th>
                                            <th>Date Plan</th>
                                            <th>Owner</th>
                                            <th>Plan Discussion</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($plans as $plan)
                                            <tr>
                                                <td>{{$plan->id}}</td>
                                                <td><a href="{{route('plan.view', $plan->id)}}">{{$plan->title}}</a>
                                                </td>
                                                <td>{{$plan->client->name}}</td>
                                                <td>{{$plan->date_written}}</td>
                                                <td>{{$plan->date_plan}}</td>
                                                <td>{{$plan->employee->name}} {{$plan->employee->surname}}</td>
                                                <td>{{Str::limit($plan->plan_discussion, 75)}}</td>
                                                <td>{{$plan->created_at}}</td>
                                                <td>{{$plan->updated_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end .card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
</x-admin-master>
