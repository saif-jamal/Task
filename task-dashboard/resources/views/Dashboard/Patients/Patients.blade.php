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
                 <h1 class="text-dark fa-2x">Patients</h1>
             </div>
             <a href="{{route('patient.create')}}" class="text-decoration-none">
                 <button class="btn btn-dark text-white">
                     Add Patients !
                 </button>
             </a>

         </div>

        <table class="table ">
            <thead class="table-dark">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone</th>
                <th scope="col">Result</th>
                <th scope="col">Controls</th>

            </thead>
            <tbody >

               @if(count($patients)>0)
                       @foreach($patients as $pati)
                         <tr>
                            <th scope="row">{{$pati->id}}</th>
                            <td>{{$pati->name}}</td>
                            <td>{{$pati->age}}</td>
                            <td>{{$pati->gender}}</td>
                            <td >{{$pati->phone}}</td>
                            <td width="120">
                                @if($pati->type==='image')
                                    <a href="{{asset('/patients/img/'.$pati->result)}}">
                                        <img class="image_patient" src="{{asset('/patients/img/'.$pati->result)}}" alt="">
                                    </a>

                                @else
                                    <a href="{{asset('/patients/pdf/'.$pati->result)}}" target="_blank">
                                        <i class="fa-solid fa-file-pdf fa-2x text-danger"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                               <div class="d-flex">
                                   <i class="fa-solid fa-eye text-success mx-1 my-1  point" title="view" onclick="event.target.parentElement.querySelector('#view_Patient').click();"></i>
                                   <i class="fa-solid fa-pencil text-info mx-1 my-1 point" title="edit" onclick="event.target.parentElement.querySelector('#edit_Patient').click();"></i>
                                   <i class="fa-solid fa-trash text-danger mx-1 my-1 point" title="delete" onclick="event.target.parentElement.querySelector('#delete_Patient').click();"></i>

                                   <a href="{{route('patient.view',$pati->id)}}" id="view_Patient" class="d-none"></a>
                                   <a href="{{route('patient.edit',$pati->id)}}" id="edit_Patient" class="d-none"></a>
                                   <a href="{{route('patient.delete',$pati->id)}}" id="delete_Patient" class="d-none"></a>

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

@if(\Illuminate\Support\Facades\Session::has('create_patient'))
    <script>
        swal("Success💥","Patient added successfully","success",{
            button:"OK",
        });
    </script>
@elseif(\Illuminate\Support\Facades\Session::has('patient_deleted'))

    <script>
        swal("Success💥","Patient deleted Done!","success",{
            button:"OK",
        });
    </script>
@elseif(\Illuminate\Support\Facades\Session::has('update_patient'))

    <script>
        swal("Success💥","Patient update Done!","success",{
            button:"OK",
        });
    </script>
@endif



</body>
</html>
