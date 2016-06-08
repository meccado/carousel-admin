<table id="datatable" class="table table-striped table-hover table-responsive datatable">
    <thead>
        <tr>
            <th>{!! trans('admin_carousel::carousel.carousels-create-name_label') !!}</th>
            <th>{!! trans('admin_carousel::carousel.carousels-create-published_label') !!}</th>
            <th>{!! trans('admin_carousel::carousel.carousels-create-description_label')!!}</th>
            <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($carousels as $carousel)
            <tr>
                <td>
                    {{$carousel->name}}
                    <div class="col-md-2">
                        <a href="{{route('admin.carousels.image-upload',['id'=>$carousel->id])}}"
                            data-toggle="tooltip"
                            data-original-title="{!! trans('admin_carousel::carousel.images-upload-btnupload') !!}"
                            class="btn btn-default"><i class="fa fa-upload"></i></a>
                    </div>
                    <span class="badge progress-bar-success pull-right">
                        {{$carousel->images != null ? $carousel->images()->count() : 0}} image(s) loaded
                    </span>
                </td>
                <td>{{$carousel->published === 1  ? 'True' : 'False'}}</td>
                <td>{{$carousel->description}}</td>
                <td>
                    <div class="row">
                        <div class="col-md-1">
                            <a href="{{route('admin.carousels.show', ['id'=>$carousel->id])}}"
                                data-toggle="tooltip"
                                data-original-title="{!! trans('admin_carousel::carousel.carousels-view_tooltip') !!}"
                                class="btn btn-primary btn-flat"><i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-1 col-md-offset-1">
                            <a href="{{route('admin.carousels.edit',['id'=>$carousel->id])}}"
                                data-toggle="tooltip"
                                data-original-title="{!! trans('admin_carousel::carousel.carousels-update-btnupdate') !!}"
                                class="btn btn-info btn-flat"><i class="fa fa-pencil"></i></a>
                        </div>
                        <div class="col-md-1 col-md-offset-1">
                            {!! Form::open(['route' => ['admin.carousels.destroy', $carousel->id],
                            'class' => 'form-horizontal confirm',
                            'role' => 'form', 'method' => 'DELETE']) !!}
                                <button data-toggle="tooltip"
                                    data-original-title="{{trans('admin_carousel::carousel.carousels-delete-btndelete') }}"
                                    type="submit" class="btn btn-danger confirm-btn btn-flat">
                                        <i class="fa fa-trash-o"></i>
                                </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>
                <button class="btn btn-primary" type="button">
                  {{trans('admin_carousel::carousel.carousels-counter_badge') }} <span class="badge">{{$carousels->count()}}</span>
                </button>
            </th>
        </tr>
    </tfoot>
</table>
