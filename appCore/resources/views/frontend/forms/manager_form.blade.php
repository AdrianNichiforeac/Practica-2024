<div class="row align-items-center mt-30">
    <div class="black-bg widget-form mb-50">
        <h4 class="widget__title__one text-white mb-15">Apply here</h4>
        <form action="{{route('managerRegistrationPost')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" placeholder="First Name">
                    <input type="text" name="surname" placeholder="Last Name">
                    <input type="email" name="email" placeholder="Email">
                    <input type="text" name="phone" placeholder="Phone">
                    <input name="dob" placeholder="Date of birth" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                </div>
                <div class="col-md-6">
                    <input type="text" name="position_interested" placeholder="Position interested ">
                    <input type="text" name="years_of_experience" placeholder="Please enter  years of experience">
                    <input type="text" name="wage_expectation" placeholder="Approximate wage expectation">
                    <div class="col-md-12">
                        <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#cv_file_m').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CV File</button>
                        <input type="file" name="cv_file" id="cv_file_m" class="file" style="display: none" onchange="displayFileNameM(this)">
                        <p id="file-name-manager"></p>
                    </div>
                </div>
            </div>
            <button type="submit" class="widget-btn mt-20">Apply Now</button>
        </form>
    </div>
</div>

<script>
    function displayFileNameM(input) {
        var fileNamePlaceholder = document.getElementById('file-name-manager');

        if (input.files.length > 0) {
            fileNamePlaceholder.textContent = 'Selected file: ' + input.files[0].name;
        } else {
            fileNamePlaceholder.textContent = 'Niciun fișier selectat';
        }
    }
</script>
@yield('scripts')
