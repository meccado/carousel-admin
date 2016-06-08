@if (isset($carousel))
  {!! Form::model($carousel,
    ['route'     => ['admin.carousels.update', $carousel->id],
    'method'     => 'PUT',
    'class'      => 'form-horizontal',
    'files'      => true])
    !!}
  @else
    {!! Form::open(['route'	=>'admin.carousels.store',
      'method'	=>'POST',
      'class'	=>'form-horizontal',
      'files'	=>'true',
    ])
    !!}
  @endif
  <fieldset>
    <!-- Text input-->
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      {!! Form::label('name', trans('admin_carousel::carousel.carousels-create-name_label') , ['class'=>'col-md-3 control-label']) !!}
      <div class="col-md-9">
        {!! Form::text('name', old('name'), ['class'=>'form-control input-md', 'placeholder'=>trans('admin_carousel::carousel.carousels-create-name_placeholder'), 'required'=>'']) !!}
        @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
      </div>
    </div>
    <div class="form-group{{ $errors->has('sort_order') ? ' has-error' : '' }}">
      {!! Form::label('sort_order', trans('admin_carousel::carousel.carousels-create-sortorder_label') , ['class'=>'col-md-3 control-label']) !!}
      <div class="col-md-9">
        {!! Form::input('number', 'sort_order', old('sort_order'), ['class'=>'form-control input-md', 'placeholder'=>trans('admin_carousel::carousel.carousels-create-sortorder_placeholder'), 'required'=>'']) !!}
        @if ($errors->has('sort_order'))
          <span class="help-block">
            <strong>{{ $errors->first('sort_order') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('published') ? ' has-error' : '' }}">
      {!! Form::label('published', trans('admin_carousel::carousel.carousels-create-published_label') , ['class'=>'col-md-3 control-label']) !!}
      <div class="col-xs-9">
        <div class="checkbox icheck">
          {{Form::checkbox('published', old('published'))}}
          @if ($errors->has('published'))
            <span class="help-block">
              <strong>{{ $errors->first('published') }}</strong>
            </span>
          @endif
        </div>
      </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
      {!! Form::label('description', trans('admin_carousel::carousel.carousels-create-description_label') , ['class'=>'col-md-3 control-label']) !!}
      <div class="col-md-9">
        {!! Form::textarea('description', old('description'), ['class'=>'form-control input-md', 'placeholder'=>trans('admin_carousel::carousel.carousels-create-description_placeholder'), 'required'=>'']) !!}
        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-3 control-label" for="submit"></label>
      <div class="col-md-9 col-md-offset-3">
        <button id="submit" name="submit" class="btn btn-sm btn-success">
          <span class="fa fa-ok-circle"></span>
          @if (isset($carousel))
            {{ trans('admin_carousel::carousel.carousels-update-btnupdate') }}
          @else
            {{trans('admin_carousel::carousel.carousels-create-btncreate') }}
          @endif
        </button>
      </div>
    </div>

  </fieldset>
  {!! Form::close() !!}
