<?php

Route::group(['namespace' 	=> 'App\Http\Controllers',
              'middleware' 	=> ['web', 'throttle'],
              ], function(){
      //'prefix'=>'api/v1',
			Route::group(['prefix' =>  'admin',
	 					 				'namespace' 	=> 'Admin'], function(){
            Route::resource('carousels', 'CarouselController', ['only' => ['index', 'show','create', 'store', 'edit', 'update', 'destroy']]);
            Route::post('carousels/{carousels}/upload', ['as' => 'admin.carousels.upload', 'uses' => 'CarouselController@upload']);
            Route::get('carousels/{carousels}/image-upload', ['as' => 'admin.carousels.image-upload', 'uses' => 'CarouselController@getUpload']);

			});
});
