<!doctype html>
<html lang="en">
@include('Dashboard.Head')
<body>
@include('Dashboard.Nav')


<div class="Patients py-5">
    <div class="container-lg container-fluid">

        <form id="contact" action="{{route('medicalstaff.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <h3>MedicalStaff Info</h3>
            <h4>please fill all fields.</h4>
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
                <input placeholder="Your name" type="text" name="name" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <input placeholder="Your specialty"  name="specialty" type="text" tabindex="2" required>
            </fieldset>

            <fieldset>
                <div class="imagefield point d-flex justify-content-center align-items-center" onclick="document.querySelector('.result').click();" >
                    <i class="fa-solid fa-plus"></i>
                </div>
                <input type="file" class="d-none result" name="image" onchange="getimage(event)" accept="image/png, image/jpg, image/jpeg" >
            </fieldset>
            <button type="submit" class="btn btn-info text-white w-25">Create</button>
        </form>


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
        }

    }


</script>
</body>
</html>
