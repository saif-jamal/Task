<!doctype html>
<html lang="en">
@include('Dashboard.Head')
<body>
@include('Dashboard.Nav')


<div class="Patients py-5">
    <div class="container-lg container-fluid">

            <form id="contact" action="{{route('patient.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <h3>Patient Info</h3>
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
                    <input placeholder="Your age"  name="age" type="text" tabindex="2" required>
                </fieldset>
                <fieldset>
                    <input placeholder="Your Phone Number" name="phone" type="tel" tabindex="3" required>
                </fieldset>
                <fieldset>
{{--                    <input placeholder="Your Web Site starts with http://" type="url" tabindex="4" required>--}}
                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </fieldset>

                <fieldset>
                   <div class="imagefield point d-flex justify-content-center align-items-center" onclick="document.querySelector('.result').click();" >
                       <i class="fa-solid fa-plus"></i>
                   </div>
                    <input type="file" class="d-none result" name="result" onchange="getimage(event)" accept="application/pdf,image/png, image/jpg, image/jpeg" >
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
         }else{
             imagefield.style.backgroundImage=`url(https://play-lh.googleusercontent.com/9XKD5S7rwQ6FiPXSyp9SzLXfIue88ntf9sJ9K250IuHTL7pmn2-ZB0sngAX4A2Bw4w)`;
         }

    }


</script>
</body>
</html>
