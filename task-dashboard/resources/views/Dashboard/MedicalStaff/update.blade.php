<!doctype html>
<html lang="en">
@include('Dashboard.Head')
<body>
@include('Dashboard.Nav')


<div class="Patients py-5">
    <div class="container-lg container-fluid">
        @if($medicalstaff)
            <form id="contact" action="{{route('medicalstaff.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="medicalstaff_id" value="{{$medicalstaff->id}}">
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
                    <input placeholder="Your name" type="text" name="name" tabindex="1" value="{{$medicalstaff->name}}" required autofocus >
                </fieldset>
                <fieldset>
                    <input placeholder="Your specialty"  name="specialty" type="text" tabindex="2" value="{{$medicalstaff->specialty}}" required>
                </fieldset>

                <fieldset>
                    @if($medicalstaff->image)
                        <div class="imagefield point d-flex justify-content-center align-items-center" onclick="document.querySelector('.result').click();" style="background-image: url({{asset('/medicalstaff/img/'.$medicalstaff->image)}})" >
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    @else
                        <div class="imagefield point d-flex justify-content-center align-items-center" onclick="document.querySelector('.result').click();"  >
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    @endif
                    <input type="file" class="d-none result" name="image" onchange="getimage(event)" accept="image/png, image/jpg, image/jpeg" >
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
            alert('please upload image only!');
        }

    }


</script>
</body>
</html>
