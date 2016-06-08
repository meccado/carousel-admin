<div class="col-md-12">
    <div class="col-md-12" id="carousel_template">
        <div class="dropzone-previews"></div>
        {!! Form::open(['route'     => ['admin.carousels.upload', $carousel->id],
                        'method'	=>'POST',
                        'class'		=>'dropzone',
                        'id'		  =>'carousel_dropzone',
                        'files'		=>'true',

                    ])
        !!}
        {!! Form::close() !!}
    </div>
</div>
