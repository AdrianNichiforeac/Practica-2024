<div class="row gutters">
    @foreach($images as $image)
        <div class="col-md-3">
            <a href="{{asset('storage/'.$image->picture)}}" class="effects">
                <img class="img-fluid" src="{{asset('storage/'.$image->picture_small)}}" alt="{{$image->imageable->name}}"/>
                <div>
                    <span class="expand"> + </span>
                </div>
            </a>
            <span class="delete_image" onclick="DeleteConfirmAJAX('delete_image({{$image->id}})')">
                <i class="fa fa-trash"></i>
            </span>
        </div>
    @endforeach
</div>
