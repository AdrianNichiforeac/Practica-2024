
<div class="card">
    <div class="card-head style-primary">
        <header class="file-manager">
            <i class="fa fa-fw fa-file"></i> <span class="file-manager"> File manager</span>
        </header>
    </div>
    <div class="col-md-12 ">
        <button style="margin-top: 10px; margin-bottom: 10px " onclick="$('#file').click()" type="button" class="btn btn-info btn-block" ><i class="md md-add"></i>Adaugă fișier</button>
    </div>
    @foreach($files as $file)
        <li class="tile" id="file_1426">
            <div class="row">
                <div class="col-md-8">

                    <div class="tile-text groove" style="font-size: 12px" >
                        <input type="text"  value="{{'/storage/'.$file->file}}" id="myInput{{$file->id}}" style="width: 100%;margin-left: 18px">
                    </div>

                </div>

                <div class="col-md-1" style="padding-top: 5px">
                    <a class="btn btn-flat ink-reaction" href="{{asset('storage/'.$file->file)}}" target="_blank">
                        <i class="icon-search" style="color: #007bff"></i>
                    </a>
                </div>
                <div class="col-md-1"  style="padding-top: 5px">
                    <a class="btn btn-flat ink-reaction" href="javascript:void(0)" onclick="myFunction({{$file->id}})">
                        <span class="tooltiptext" ></span>
                        <i class="icon-copy" id="myTooltip{{$file->id}}" style="color: green"></i>
                    </a>
                </div>
                <div class="col-md-1"  style="padding-top: 5px">
                    <a class="btn btn-flat ink-reaction" href="javascript:void(0)" onclick="DeleteConfirmAJAX('delete_file({{$file->id}})')">
                        <i class="fa fa-trash new"></i>
                    </a>
                </div>

            </div>

        </li>
        <script>
            function myFunction(id) {
                /* Get the text field */
                var copyText = document.getElementById("myInput"+id);
                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                document.execCommand("copy");

                /* Alert the copied text */
                var tooltip = document.getElementById("myTooltip"+id);
                tooltip.innerHTML = "Copiat ";

            }
        </script>
    @endforeach
</div>
