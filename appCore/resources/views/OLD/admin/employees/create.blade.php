<x-admin-master>
    @section('content')


        <div class="row" style="padding: 15px">
            <div class="col-lg-offset-0 col-md-6" >
                <form class="form" method="post" action="{{route('employee.store')}}">
                    @csrf
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Add Employees</header>
                        </div>
                        <div class="card-body floating-label">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" id="title" aria-describedby="">
                                        <label for="Name">Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <textarea
                                            name="description" id="description"  class="form-control"></textarea>
                                        <label for="textarea1">Textarea</label>
                                    </div>
                                </div>
                            </div>
                        </div><!--end .card-body -->
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Submit</button>
                            </div>
                        </div>
                    </div><!--end .card -->
                </form>

            </div><!--end .col -->
        </div>
    @endsection
</x-admin-master>
