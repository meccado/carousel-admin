@extends('admin.layouts.admin-master')

@section('title')
     {{-- this page title --}}
     {!!(isset($title)) ? $title : 'Create Carousel Page'!!}
@stop

@section('styles')
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower_components/AdminLTE/plugins/iCheck/square/blue.css')}}">
@endsection

@section('content')
  <p>
    {!! link_to_route('admin.carousels.index', trans('admin_carousel::carousel.carousels-index-add_index'), [], ['class' => 'btn btn-default btn-flat']) !!}
  </p>
	<div class="box box-primary"><!-- .box -->
		<div class="box-header with-border"><!-- .box-header -->
			<h3 class="box-title pull-left">
				{{ trans('admin_carousel::carousel.carousels-create-create_carousel') }}
			</h3>
		</div><!-- /.box-header -->

		<div class="box-body"><!-- .box-body -->
		    @include('admin.carousels._form')
		</div><!-- /.box-body -->

		<div class="box-footer"><!-- .box-footer-->
			  {{ trans('admin_carousel::carousel.carousels-create-footer') }}
		</div><!-- /.box-footer-->
	</div><!-- /.box -->
@endsection

@section('scripts')
  <!-- iCheck -->
  <script src="{{ URL::asset('assets/bower_components/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
@endsection
