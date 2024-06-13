<div class="baguetteBoxThree gallery" id="gallery">
    @include('admin.components.gallery.images', ['images' => $parent->images])
</div>
<div class="text-left">
    <div style="display: none">
        <input type="file" name="pictureGallery" class="custom-file-input" id="uploadPhotoGallery">
    </div>
    <a class="btn btn-info btn-sm" href="javascript:void(0)"  onclick="$('#uploadPhotoGallery').click();" style="color: white">Imagine <i class="icon-image"></i></a>
</div>

<script>
    /**
     * Initiate Ajax request when add image
     */
    $('#uploadPhotoGallery').change(function(){
        store_image()
    })

    /**
     * Store image to gallery and update gallery content
     */
    function store_image(){
        console.log("{{$type}}");
        var fileInput = document.getElementById('uploadPhotoGallery');
        var dataForm = new FormData();
        var file = fileInput.files[0];
        dataForm.append('picture', file);
        dataForm.append('imageable_type', '{{$type}}');

        $.ajax({
            url: "{{route('images.store_image', $parent->id)}}",
            type:"POST",
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            data: dataForm,
            success:function(response){
                console.log(response);
                $('#gallery').html(response);
                restart_gallery();
            },
            error:function(response){
                console.log(response);
            },
            processData: false,
            contentType: false,
        });
    }

    function delete_image(id){
        $.ajax({
            url: "{{route('images.destroy_image', [$parent->id])}}",
            type:"DELETE",
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            data: {'id': id},
            success:function(response) {
                 $('#gallery').html(response);
                 $('#deleteModal').modal('hide');
                 restart_gallery();
            },
        });
    }

    function restart_gallery(){
        if(typeof oldIE === 'undefined' && Object.keys)
            hljs.initHighlighting();
        baguetteBox.run('.baguetteBoxOne');
        baguetteBox.run('.baguetteBoxTwo');
        baguetteBox.run('.baguetteBoxThree', {
            animation: 'fadeIn',
        });
        baguetteBox.run('.baguetteBoxFour', {
            buttons: false
        });
        baguetteBox.run('.baguetteBoxFive');
    }
</script>
