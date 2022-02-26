<!doctype html>
<html lang="en">
@include('Dashboard.Head')
<body>
@include('Dashboard.Nav')


<div class="Patients py-5">
    <div class="container-lg container-fluid">
        @if($patient)
          <form id="contact" action="{{route('patient.update')}}" method="post" enctype="multipart/form-data">
            @csrf
              <input type="hidden" name="patient_id" value="{{$patient->id}}">
            <h3>Update Medicalstaff Info</h3>
            {{--display message error here--}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <fieldset>
                <input placeholder="Your name" type="text" name="name" tabindex="1" value="{{$patient->name}}" required autofocus >
            </fieldset>
            <fieldset>
                <input placeholder="Your age"  name="age" type="text" tabindex="2" value="{{$patient->age}}" required>
            </fieldset>
            <fieldset>
                <input placeholder="Your Phone Number" name="phone" type="tel" tabindex="3" value="{{$patient->phone}}" required>
            </fieldset>

            <fieldset>
                <select name="gender" id="gender">
                    @if($patient->gender == "male")
                        <option value="male" selected>Male</option>
                        <option value="Female">Female</option>

                    @else
                        <option value="male" >Male</option>
                        <option value="Female" selected>Female</option>
                    @endif

                </select>
            </fieldset>

            <fieldset>
                @if($patient->result)

                   @if($patient->type === "image" )
                        <div class="imagefield point d-flex justify-content-center align-items-center" onclick="document.querySelector('.result').click();" style="background-image: url({{asset('patients/img/'.$patient->result)}})" >
                            <i class="fa-solid fa-plus"></i>
                        </div>
                   @else
                        <div class="imagefield point d-flex justify-content-center align-items-center" onclick="document.querySelector('.result').click();" style="background-image: url('https://play-lh.googleusercontent.com/9XKD5S7rwQ6FiPXSyp9SzLXfIue88ntf9sJ9K250IuHTL7pmn2-ZB0sngAX4A2Bw4w')" >
                            <i class="fa-solid fa-plus"></i>
                        </div>
                   @endif

                @else
                    <div class="imagefield point d-flex justify-content-center align-items-center" onclick="document.querySelector('.result').click();"  >
                        <i class="fa-solid fa-plus"></i>
                    </div>
                @endif

                <input type="file" class="d-none result" name="result" onchange="getimage(event)" accept="application/pdf,image/png, image/jpg, image/jpeg" >
            </fieldset>

            <button type="submit" class="btn btn-info text-white w-25">Update</button>
        </form>
        @endif

    </div>


</div>



@include('Dashboard.Footer')
@include('Dashboard.Bottom')
<script>
    function getimage(e){
        let imagefield=document.querySelector('.imagefield');
        let oob_img=window.URL.createObjectURL(e.target.files[0]);
        if(e.target.files[0].type=='image/png' || e.target.files[0].type=='image/jpg' ||e.target.files[0].type=='image/jpeg'){
            imagefield.style.backgroundImage=`url(${oob_img})`;
            console.log(e.target.files[0]);
        }else{
            imagefield.style.backgroundImage=`url(https://play-lh.googleusercontent.com/9XKD5S7rwQ6FiPXSyp9SzLXfIue88ntf9sJ9K250IuHTL7pmn2-ZB0sngAX4A2Bw4w)`;
        }

    }


</script>
</body>
</html>
