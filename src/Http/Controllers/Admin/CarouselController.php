<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Meccado\CarouselAdmin\Http\Requests;
use Meccado\CarouselAdmin\Http\Requests\CarouselFormRequest as CarouselFormRequest;
use Meccado\CarouselAdmin\Http\Requests\ImageFormRequest as ImageFormRequest;
use App\Http\Controllers\Controller;
use App\Carousel as Carousel;
use Illuminate\Support\Facades\Input as Input;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::with('Images')
                            ->orderBy('sort_order', 'asc')
                            ->get();
        return \View::make('admin.carousels.index')->with(compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \View::make('admin.carousels.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $carousel = Carousel::create([
            'name'          => $request->input('name'),
            'description'   => $request->input('description'),
            'created_by'    => \Auth::user() ? \Auth::user()->id : 0, // Auth::id();
            'sort_order'    => $request->input('sort_order') ? $request->input('sort_order') : 0,
            'published'     => $request->input('published') === 'on' ? true : false,
        ]);
        $carousel->save();
        return \Redirect::route('admin.carousels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carousel = Carousel::with('images')->find($id);
        return \View::make('admin.carousels.show')->with(compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        //dd($carousel);
        return \View::make('admin.carousels.update')->with(compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carousel = Carousel::findOrFail($id);
        if(!( (\Auth::user() ? \Auth::user()->id : 0)  == $carousel->created_by)){
            abort('403', 'You are not allowed to update the Carousel.');
        }
        $carousel->name          = $request->input('name');
        $carousel->description   = $request->input('description');
        $carousel->sort_order    = $request->input('sort_order') ? $request->input('sort_order') : 0;
        $carousel->published     = $request->input('published') === 'on' ? true : false;
        $carousel->update();
        return \Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = Carousel::findOrFail($id);
        if(!( (\Auth::user() ? \Auth::user()->id : 0)  == $carousel->created_by)){
            abort('403', 'You are not allowed to delete the photoAlbum.');
        }
        foreach($carousel->images as $mage){
           unlink(public_path($mage->file_path));
        }

        $carousel->images()->delete();
        $carousel->delete();
        return \Redirect::back();
    }


      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUpload($id)
    {
        $carousel = Carousel::with('images')->find($id);
        return \View::make('admin.carousels.upload')->with(compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(ImageFormRequest $request, $id)
    {
        if(Input::hasFile('file')) {
            $file = $request->file('file');
            $filename = uniqid() . $file->getClientOriginalName();
            $file->move('assets/carousel/images', $filename );
            $carousel = Carousel::find($id);
            $image = $carousel->images()->create([
                'carousel_id'   => $request->input('carousel_id'),
                'file_name'     => $filename,
                'file_size'     => $file->getClientSize(),
                'file_mime'     => $file->getClientMimeType(),
                'file_path'     => '/assets/carousel/images/'.$filename,
                'created_by'    => \Auth::user() ? \Auth::user()->id : 0,
            ]);
            return response()->json($image, 200);
        }else{
             return response()->json(false, 200);
        }
    }
}
