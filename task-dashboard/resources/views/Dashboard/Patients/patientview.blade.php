<!doctype html>
<html lang="en">
@include('Dashboard.Head')
<body>
@include('Dashboard.Nav')


<div class="Patients py-5">
    <div class="container-lg container-fluid">
       @if($patient)
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end my-3 my-lg-0">
                    <div class="dropdown">
                        <a class="showeditmenu" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical text-white"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('patient.edit',$patient->id)}}">Edit</a></li>
                            <li><a class="dropdown-item" href="{{route('patient.delete',$patient->id)}}">delete</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    @if($patient->type==='image')
                        <a href="{{asset('/patients/img/'.$patient->result)}}">
                            <img class="image_patient_view" src="{{asset('/patients/img/'.$patient->result)}}" alt="">
                        </a>
                    @else
                        <a href="{{asset('/patients/pdf/'.$patient->result)}}" target="_blank">
                            <img class="image_patient_view" src="https://play-lh.googleusercontent.com/3tLaTWjP9kz56OwkbnbAnZoNp4HL28zcDMt5DEjt-kfuVhraWJBYC5XQRuMBf084JQ" alt="">
                        </a>
                    @endif
                </div>
                <div class="col-md-6 px-1 my-3">
                      <p>Name: {{$patient->name}}</p>
                      <p>Age: {{$patient->age}}</p>
                      <p>phone: {{$patient->phone}}</p>
                </div>
            </div>
       @endif

    </div>


</div>



@include('Dashboard.Footer')
@include('Dashboard.Bottom')

</body>
</html>
