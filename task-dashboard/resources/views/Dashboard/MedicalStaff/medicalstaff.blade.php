<!doctype html>
<html lang="en">
@include('Dashboard.Head')
<body>
@include('Dashboard.Nav')


<div class="Patients py-5">
    <div class="container-lg container-fluid">
        <div class="col-md-12 my-5 d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-center align-items-center">
                <i class="fa-solid fa-bed-pulse fa-3x text-success mx-2"></i>
                <h1 class="text-dark fa-2x">Medical Staffs </h1>
            </div>
            <a href="{{route('medicalstaff.create')}}" class="text-decoration-none">
                <button class="btn btn-dark text-white">
                    create!
                </button>
            </a>

        </div>

        <table class="table ">
            <thead class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Specialty</th>
            <th scope="col">image</th>
            <th scope="col">Controls</th>

            </thead>
            <tbody >

            @if(count($medicalstaff)>0)
                @foreach($medicalstaff as $staff)
                    <tr>
                        <th scope="row">{{$staff->id}}</th>
                        <td>{{$staff->name}}</td>
                        <td>{{$staff->specialty}}</td>
                        <td width="120">
                            <a href="{{asset('/medicalstaff/img/'.$staff->image)}}">
                                <img class="image_patient" src="{{asset('/medicalstaff/img/'.$staff->image)}}" alt="">
                            </a>
                        </td>

                        <td>
                            <div class="d-flex">
                                <i class="fa-solid fa-eye text-success mx-1 my-1  point" title="view" onclick="event.target.parentElement.querySelector('#view_Patient').click();"></i>
                                <i class="fa-solid fa-pencil text-info mx-1 my-1 point" title="edit" onclick="event.target.parentElement.querySelector('#edit_Patient').click();"></i>
                                <i class="fa-solid fa-trash text-danger mx-1 my-1 point" title="delete" onclick="event.target.parentElement.querySelector('#delete_Patient').click();"></i>

                                <a href="{{route('medicalstaff.view',$staff->id)}}" id="view_Patient" class="d-none"></a>
                                <a href="{{route('medicalstaff.edit',$staff->id)}}" id="edit_Patient" class="d-none"></a>
                                <a href="{{route('medicalstaff.delete',$staff->id)}}" id="delete_Patient" class="d-none"></a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class=" border-0">
                        <p class="ms-5">No data in our record </p>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>


</div>



@include('Dashboard.Footer')
@include('Dashboard.Bottom')

@if(\Illuminate\Support\Facades\Session::has('create_medicalstaff'))
    <script>
        swal("Success💥"," created success","success",{
            button:"OK",
        });
    </script>
@elseif(\Illuminate\Support\Facades\Session::has('medicalstaff_deleted'))

    <script>
        swal("Success💥","deleted Done!","success",{
            button:"OK",
        });
    </script>
@elseif(\Illuminate\Support\Facades\Session::has('medicalstaff_updated'))

    <script>
        swal("Success💥","update Done!","success",{
            button:"OK",
        });
    </script>
@endif



</body>
</html>
