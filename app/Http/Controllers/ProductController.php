<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.product.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.new',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->forceFill($request->except(['_token']));
        $product->save();
        $img_name = "product_".$request->name."_".$product->id;
        $product->img = $img_name;
        $product->save();
        $this->fileUpload($request,$img_name);
        $products = Product::all();
        return view('admin.product.index',compact('products'));
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::find($request->id);
        if($request->has('status'))
        {
            $product->status = $request->status;
        }else {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            if($request->has('img')) {
                $product->img = "product_" . $request->name . "_" . $product->id . ".jpg";
                $this->fileUpload($request, $product->img);
            }
        }
        $product->update();
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
