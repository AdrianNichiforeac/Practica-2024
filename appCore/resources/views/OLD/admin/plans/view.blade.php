<x-admin-master>
    @section('content')
        <div class="row" style="padding: 15px">
            <div class="col-lg-offset-0 col-md-8">
                <div class="card">
                    <div class="card-head style-primary">
                        <header>View Plan</header>
                    </div>
                    <div class="card-body floating-label">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text"
                                           name="title"
                                           class="form-control"
                                           id="title"
                                           readonly
                                           aria-describedby=""
                                           value="{{$plan->title}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="plan_discussion">Plan Discussion</label>
                                    <textarea
                                        name="plan_discussion"
                                        id="plan_discussion"
                                        readonly
                                        cols="30"
                                        rows="10" class="form-control">{{$plan->plan_discussion}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-offset-0 col-md-4">
                <div class="card">
                    <div class="card-head style-primary">
                        <div class="card-head style-primary">
                            <header>Comments Section</header>
                            <div class="btn-group">
                                <a href="{{route('plan.comment.create', $plan->id)}}" class="btn btn-accent-dark"><i><b>Add
                                            Comment</b></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Comment</th>
                                        <th>Created by</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>{{Str::limit($comment->commentary, 25)}}</td>
                                            <td>{{$comment->employee->name}} {{$comment->employee->surname}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
</x-admin-master>
