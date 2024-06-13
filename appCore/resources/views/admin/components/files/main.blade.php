<ul class="list divider-full-bleed" id="files_container">
    @include('admin.components.files.files', ['files' => $parent->files])
</ul>
<input type="file" name="file" id="file" class="file" style="display: none">


<script>
    /**
     * Initiate Ajax request when add image
     */
    $('#file').change(function(){
        store_file()
    })

    /**
     * Store image to gallery and update gallery content
     */
    function store_file(){
        console.log("{{$type}}");
        var fileInput = document.getElementById('file');
        var dataForm = new FormData();
        var file = fileInput.files[0];
        dataForm.append('file', file);
        dataForm.append('fileable_type', '{{$type}}');

        $.ajax({
            url: "{{route('files.store_file', $parent->id)}}",
            type:"POST",
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            data: dataForm,
            success:function(response){
                $('#files_container').html(response);
            },
            error:function(response){
                console.log(response)
            },
            processData: false,
            contentType: false,
        });
    }

    function delete_file(id){
        $.ajax({
            url: "{{route('files.destroy_file', [$parent->id])}}",
            type:"DELETE",
            headers: {
                'X-CSRF-Token': "{{ csrf_token() }}"
            },
            data: {'id': id},
            success:function(response) {
                $('#files_container').html(response);
                $('#deleteModal').modal('hide');
            },
        });
    }


</script>
