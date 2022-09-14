<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        return view('admin.category.index' , ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newImageName = time() . '-' . $request->name . '.' . 
        $request->image->extension();

        $request->image->move(public_path('images'),$newImageName);

        
        Category::create([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            'image'=>$newImageName,
            'status'=>$request->input('Status') == TRUE ? '1':'0',
            'popular'=>$request->input('Popular') == TRUE ? '1':'0',
            'meta_title'=>$request->input('meta_title'),
            'meta_keywords'=>$request->input('meta_keywords'),
            'meta_descrip'=>$request->input('meta_descrip'),

        ]);//in this way we need to make a new proparty call fillable to out model


        return redirect('categories');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'images/'.$category->image;

            if (File::exists($path)) {

                File::delete($path);
            }

            $newImageName = time() . '-' . $request->name . '.' . 
            $request->image->extension();
            $request->image->move(public_path('images'),$newImageName);

        }

        $category->update([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            'image'=>$newImageName,
            'status'=>$request->input('Status') == TRUE ? '1':'0',
            'popular'=>$request->input('Popular') == TRUE ? '1':'0',
            'meta_title'=>$request->input('meta_title'),
            'meta_keywords'=>$request->input('meta_keywords'),
            'meta_descrip'=>$request->input('meta_descrip'),

        ]);

        return redirect('categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $path = 'images/'.$category->image;

            if (File::exists($path)) {

                File::delete($path);
            }
        $category->delete();

        return redirect('categories');
    }
}
