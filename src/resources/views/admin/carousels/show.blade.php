@extends('admin.layouts.admin-master')

@section('title')
     {{-- this page title --}}
     {!!(isset($title)) ? $title : 'Show Carousel Page'!!}
@stop

@section('styles')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.css" rel="stylesheet">
@endsection

@section('content')
  <div class="container">
    <p>
        <a href="{{  route('admin.carousels.image-upload', ['carousels' => $carousel->id]) }}"
          class="btn btn-default btn-flat"><i class="fa fa-upload pull-right"></i>
            {{trans('admin_carousel::carousel.images-upload-add_new')}}
        </a>
        {!! link_to_route('admin.carousels.index', trans('admin_carousel::carousel.carousels-index-add_index'), [], ['class' => 'btn btn-default btn-flat']) !!}
        {!! link_to_route('admin.carousels.edit', trans('admin_carousel::carousel.carousels-index-add_edit'), ['id'=>$carousel->id], ['class' => 'btn btn-info btn-flat']) !!}
    </p>
    @if($carousel != null)
        <div class="box box-primary"><!-- .box -->
            <div class="box-header with-border"><!-- .box-header -->

                <h3 class="box-title pull-left">
                    {!!trans('admin_carousel::carousel.carousels-show-carousel')!!}
                </h3>
            </div><!-- /.box-header -->

            <div class="box-body"><!-- box-body -->
                <div class="row">
                    @include('admin.carousels._single_top')
            <div class="box-footer"><!-- .box-footer-->
              {{ trans('admin_carousel::carousel.carousels-show-footer') }}
            </div><!-- /.box-footer-->

        </div><!-- /.box -->
    @else
        {{ trans('admin_carousel::carousel.carousels-show-no_entry_found') }}
    @endif
  </div>
@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.js"></script>
	<script>
		Dropzone.options.carouselDropzone = {
			//autoProcessQueue	: false,
			//uploadMultiple		: true,
			maxFilesize			    : 10,
			maxFiles			      : 1,
			acceptedFiles       : 'image/*',
      thumbnailWidth      : 180,
      thumbnailHeight     : 120,
      parallelUploads     : 100,
		};
	</script>
@endsection
