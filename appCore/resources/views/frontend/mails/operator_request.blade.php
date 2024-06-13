<p>
    Name/Surname: {{$operator_request->surname}} {{$driver_request->name}}<br>
    DoB: {{$operator_request->dob}}<br>
    Email: {{$operator_request->email}}<br>
    Phone: {{$operator_request->phone}}<br>
    State : {{$operator_request->states['name']}}<br>
    City : {{$operator_request->city}}<br>
    Address : {{$operator_request->address}}<br>
    ZIP : {{$operator_request->zip_code}}<br>
    Experience : {{$operator_request->experience}}<br>
    Type registration : Owners Operators<br>

    <a target="_blank" href="https://ginationalcorp.com/storage/operators/cdl_front/{{$operator_request->cdl_front}}">CDL Front</a><br>
    <a target="_blank" href="https://ginationalcorp.com/storage/operators/cdl_back/{{$operator_request->cdl_back}}">CDL Back</a><br>
    <a target="_blank" href="https://ginationalcorp.com/storage/operators/medical_files/{{$operator_request->medical_file}}">Medical File</a><br>
</p>
