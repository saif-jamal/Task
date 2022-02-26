<!doctype html>
<html lang="en">
@include('Dashboard.Head')
<body>
@include('Dashboard.Nav')


<div class="Patients py-5">
    <div class="container-lg container-fluid">
        @if($news)
            <form id="contact" action="{{route('news.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="news_id" value="{{$news->id}}">
                <h3>Update News Info</h3>
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
                    <input placeholder="Your headline" type="text" name="newsHeadline" tabindex="1" value="{{$news->newsHeadline}}" required autofocus >
                </fieldset>
                <fieldset>
                    <input placeholder="Your text content"  name="content" type="text" tabindex="2" value="{{$news->content}}" required>
                </fieldset>

                <fieldset>
                    @if($news->image)
                        <div class="imagefield point d-flex justify-content-center align-items-center" onclick="document.querySelector('.result').click();" style="background-image: url({{asset('/news/img/'.$news->image)}})" >
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
