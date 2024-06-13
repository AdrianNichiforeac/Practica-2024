<x-admin-master>
    @section('content')
        <div class="row" style="padding: 15px">
            <div class="col-lg-offset-0 col-md-10">
                <form class="form" method="post" action="{{route('plan.comment.store', $plan->id)}}">
                    @csrf
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Add Comment to {{$plan->title}} Plan</header>
                        </div>
                        <div class="card-body floating-label">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="commentary">Comment</label>
                                        <textarea
                                            name="commentary"
                                            id="commentary"
                                            cols="30"
                                            rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-actionbar">
                            <div class="card-actionbar-row">
                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Submit</button>
                            </div>
                        </div>
                    </div><!--end .card-body -->
                </form>
            </div><!--end .col -->
        </div>
    @endsection
</x-admin-master>
