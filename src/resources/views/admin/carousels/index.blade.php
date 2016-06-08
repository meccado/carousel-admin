@extends('admin.layouts.admin-master')

@section('title')
  {{-- this page title --}}
  {!!(isset($title)) ? $title : 'List Carousel Page'!!}
@stop

@section('styles')
  {{-- this page specialised styles --}}
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('content')

    <p>
        {!! link_to_route('admin.carousels.create', trans('admin_carousel::carousel.carousels-index-add_new'), [], ['class' => 'btn btn-success btn-flat']) !!}
    </p>

    @if($carousels->count() > 0)
      <div class="box box-primary"><!-- .box -->
        <div class="box-header with-border"><!-- .box-header -->

          <h3 class="box-title pull-left">
            {{ trans('admin_carousel::carousel.carousels-index-carousels_list') }}
          </h3>
        </div><!-- /.box-header -->

        <div class="box-body"><!-- box-body -->
          @include('admin.carousels._table')
        </div><!-- /.box-body -->

        <div class="box-footer"><!-- .box-footer-->
          {{ trans('admin_carousel::carousel.carousels-index-footer') }}
        </div><!-- /.box-footer-->

      </div><!-- /.box -->

    @else
      {{ trans('admin_carousel::carousel.carousels-index-no_entries_found') }}
    @endif

  @endsection

  @section('scripts')
    {{-- this page specialised scripts --}}
    <!-- DataTables -->
    <script type="text/javascript">
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <script src="{{ URL::asset('assets/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  @stop
