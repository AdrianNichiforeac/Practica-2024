<p>
    Name/Surname: {{$driver_request->surname}} {{$driver_request->name}}<br>
    DoB: {{$driver_request->dob}}<br>
    Email: {{$driver_request->email}}<br>
    Phone: {{$driver_request->phone}}<br>
    State : {{$driver_request->states['name']}}<br>
    City : {{$driver_request->city}}<br>
    Address : {{$driver_request->address}}<br>
    ZIP : {{$driver_request->zip_code}}<br>
    Experience : {{$driver_request->experience}}<br>
    Type registration : DRIVER<br>
    <a target="_blank" href="https://ginationalcorp.com/storage/drivers/cdl_front/{{$driver_request->cdl_front}}">CDL Front</a><br>
    <a target="_blank" href="https://ginationalcorp.com/storage/drivers/cdl_back/{{$driver_request->cdl_back}}">CDL Back</a><br>
    <a target="_blank" href="https://ginationalcorp.com/storage/drivers/medical_files/{{$driver_request->medical_file}}">Medical File</a><br>
</p>
