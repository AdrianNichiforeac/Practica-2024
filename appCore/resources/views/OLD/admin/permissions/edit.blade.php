<x-admin-master>
    @section('content')
        @if(session()->has('permission-updated'))
            <div class="alert alert-success">
                {{session('permission-updated')}}
            </div>
        @endif
            <div class="row" style="padding: 15px">
                <div class="col-lg-offset-0 col-md-4" >
                    <form class="form" method="post" action="{{route('permission.update',$permission->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-head style-primary">
                                <header>Edit Permission: {{$permission->name}}</header>
                            </div>
                            <div class="card-body floating-label">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" value="{{$permission->name}}">
                                            <label for="name">Name</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end .card-body -->
                            <div class="card-actionbar">
                                <div class="card-actionbar-row">
                                    <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update</button>
                                </div>
                            </div>
                        </div><!--end .card -->
                    </form>
                </div>
            </div>
    @endsection
</x-admin-master>
