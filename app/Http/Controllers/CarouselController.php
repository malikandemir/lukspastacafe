<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $carousels = Carousel::all();
        return view('admin.carousel.index',compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.carousel.new");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carousel = new Carousel();
        $carousel->forceFill($request->except(['_token']));
        $carousel->save();
        $img_name = "carousel_".$request->name."_".$carousel->id;
        $carousel->img = $img_name;
        $carousel->save();
        $this->fileUpload($request,$img_name);
        $carousels = Carousel::all();
        return view('admin.carousel.index',compact('carousels'));
    }

    public function fileUpload(Request $request,$img_name) {
        $this->validate($request, [
            'img' => 'required|image|mimes:jpg|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $name = $img_name;
            $destinationPath = public_path('storage/img/');
            $t = $image->move($destinationPath, $name);

            return back()->with('success','Image Upload successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit',compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {

        $carousel->name = $request->name;
        $carousel->description = $request->description;
        $carousel->img = "carousel_".$request->name."_".$carousel->id.".jpg";
        $carousel->update();
        $this->fileUpload($request,$carousel->img);
        $carousels = Carousel::all();
        return view('admin.carousel.index',compact('carousels'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        //
    }
}
