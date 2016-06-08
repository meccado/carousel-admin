<div class="col-md-12">
   <ul id="image-lists" style="margin: 0; padding: 0;">
        @foreach($carousel->images as $image)
            <li style="margin: 0; padding: 0; list-style: none; float: left; padding-right: 10px ">
                <a href="{{URL::to($image->file_path)}}" data-lightbox="carousel" target="_blank">
                    <img src="{{asset($image->file_path)}}" alt="{{$image->file_name}}" class="img-responsive" style="width: 240px; height: 160; border: 2px solid black; margin-bottom: 10px">
                </a>
            </li>
        @endforeach
   </ul>
</div>
<div class="col-md-12">
    <h3>{{$carousel->name}} <small> :: {{$carousel->description}}</small></h3>
</div>
