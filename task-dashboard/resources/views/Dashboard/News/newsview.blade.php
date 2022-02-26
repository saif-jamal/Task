<!doctype html>
<html lang="en">
@include('Dashboard.Head')
<body>
@include('Dashboard.Nav')


<div class="Patients py-5">
    <div class="container-lg container-fluid">
        @if($news)
            <div class="row">
                <div class="col-md-12 d-flex justify-content-end my-3 my-lg-0">
                    <div class="dropdown">
                        <a class="showeditmenu" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical text-white"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('news.edit',$news->id)}}">Edit</a></li>
                            <li><a class="dropdown-item" href="{{route('news.delete',$news->id)}}">delete</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">

                    <a href="{{asset('/news/img/'.$news->image)}}">
                        <img class="image_patient_view" src="{{asset('/news/img/'.$news->image)}}" alt="">
                    </a>

                </div>
                <div class="col-md-6 px-1 my-3">
                    <p>News Headline: {{$news->newsHeadline}}</p>
                    <p class="newscontent text-wrap">Content: {{$news->content}}</p>
                </div>
            </div>
        @endif

    </div>


</div>



@include('Dashboard.Footer')
@include('Dashboard.Bottom')

</body>
</html>
