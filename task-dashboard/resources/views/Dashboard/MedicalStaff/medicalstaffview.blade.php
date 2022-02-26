<!doctype html>
<html lang="en">
@include('Dashboard.Head')
<body>
@include('Dashboard.Nav')


<div class="Patients py-5">
    <div class="container-lg container-fluid">
        @if($medicalstaff)
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end my-3 my-lg-0">
                    <div class="dropdown">
                        <a class="showeditmenu" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical text-white"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('medicalstaff.edit',$medicalstaff->id)}}">Edit</a></li>
                            <li><a class="dropdown-item" href="{{route('medicalstaff.delete',$medicalstaff->id)}}">delete</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">

                    <a href="{{asset('/medicalstaff/img/'.$medicalstaff->image)}}">
                        <img class="image_patient_view" src="{{asset('/medicalstaff/img/'.$medicalstaff->image)}}" alt="">
                    </a>

                </div>
                <div class="col-md-6 px-1 my-3">
                    <p>Name: {{$medicalstaff->name}}</p>
                    <p>Specialty: {{$medicalstaff->specialty}}</p>
                </div>
            </div>
        @endif

    </div>


</div>



@include('Dashboard.Footer')
@include('Dashboard.Bottom')

</body>
</html>
