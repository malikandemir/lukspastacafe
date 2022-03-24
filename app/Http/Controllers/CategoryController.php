<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.category.new");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->forceFill($request->except(['_token']));
        $category->save();
        $img_name = "category_".$request->name."_".$category->id;
        $category->img = $img_name;
        $category->save();
        $this->fileUpload($request,$img_name);
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($request->has('status'))
        {
            $category->status = $request->status;
        }else {
            $category->name = $request->name;
            $category->description = $request->description;
            $category->img = "category_" . $request->name . "_" . $category->id . ".jpg";
            $this->fileUpload($request,$category->img);
        }
        $category->update();
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
