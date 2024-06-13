<div class="row align-items-center mt-30">
<div class="black-bg widget-form mb-50">
    <h4 class="widget__title__one text-white mb-15">Apply here</h4>
    <form action="{{route('driverRegistrationPost')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="name" placeholder="First Name">
                <input type="text" name="surname" placeholder="Last Name">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="phone" placeholder="Phone">
                <input name="dob" placeholder="Date of birth" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                <div class="col-md-12">
                    <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#cdl_front_file').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CDL Front File</button>
                    <input type="file" name="cdl_front" id="cdl_front_file" class="file" style="display: none" onchange="displayCDLFront(this)">
                    <p id="cdl_front_placeholder"></p>
                </div>
                <div class="col-md-12">
                    <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#cdl_back_file').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CDL Back File</button>
                    <input type="file" name="cdl_back" id="cdl_back_file" class="file" style="display: none" onchange="displayCDLBack(this)">
                    <p id="cdl_back_placeholder"></p>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" name="address" placeholder="Address">
                <input type="text" name="city" placeholder="City">
                <select name="state_id" class="mb-3" style="height: 60px; overflow-y: auto; background: transparent; color: white; background-color: #181818;width: 100%; border: 2px solid rgba(255, 255, 255, 0.1)">
                    <option value="">State</option>
                    @foreach($states as $state)
                        <option value="{{$state->id}}" >{{$state->name}}</option>
                    @endforeach
                </select>
                <input type="text" name="zip_code" placeholder="ZIP code">
                <input type="text" name="experience" placeholder="How many years of experience">
                <div class="col-md-12">
                    <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#medical_file_d').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> Medical File</button>
                    <input type="file" name="medical_file" id="medical_file_d" class="file" style="display: none" onchange="displayMedicalFileD(this)">
                    <p id="medical-placeholder"></p>
                </div>
            </div>
        </div>
        <button type="submit" class="widget-btn mt-20">Apply Now</button>
    </form>
</div>
</div>

<script>
    function displayCDLFront(input) {
        var fileNamePlaceholder = document.getElementById('cdl_front_placeholder');

        if (input.files.length > 0) {
            fileNamePlaceholder.textContent = 'Selected file: ' + input.files[0].name;
        } else {
            fileNamePlaceholder.textContent = 'Niciun fișier selectat';
        }
    }

    function displayCDLBack(input) {
        var fileNamePlaceholder = document.getElementById('cdl_back_placeholder');

        if (input.files.length > 0) {
            fileNamePlaceholder.textContent = 'Selected file: ' + input.files[0].name;
        } else {
            fileNamePlaceholder.textContent = 'Niciun fișier selectat';
        }
    }

    function displayMedicalFileD(input) {
        var fileNamePlaceholder = document.getElementById('medical-placeholder');

        if (input.files.length > 0) {
            fileNamePlaceholder.textContent = 'Selected file: ' + input.files[0].name;
        } else {
            fileNamePlaceholder.textContent = 'Niciun fișier selectat';
        }
    }
</script>
@yield('scripts')
