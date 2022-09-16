<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = Product::all();
        return view('admin.product.index',[
            'products' => $Products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',['categories' => $categories]);
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

        $request->image->move(public_path('assets/uploads/products'),$newImageName);

        
        Product::create([
            'name'=>$request->input('name'),
            'cate_id'=>$request->input('cate_id'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            'small_description'=>$request->input('small_description'),
            'original_price'=>$request->input('original_price'),
            'selling_price'=>$request->input('selling_price'),
            'qty'=>$request->input('qty'),
            'tax'=>$request->input('tax'),
            'image'=>$newImageName,
            'status'=>$request->input('status') == TRUE ? '1':'0',
            'trending'=>$request->input('trending') == TRUE ? '1':'0',
            'meta_title'=>$request->input('meta_title'),
            'meta_keywords'=>$request->input('meta_keywords'),
            'meta_description'=>$request->input('meta_descrip'),

        ]);//in this way we need to make a new proparty call fillable to out model


        return redirect('products')->with('status','Product Created successfully');
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
        $product = Product::find($id);
        $categories = Category::all();
        
        return view('admin.product.edit',['product'=>$product,'categories'=>$categories]);
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
        $product = Product::find($id);

        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/products/'.$product->image;

            if (File::exists($path)) {

                File::delete($path);
            }

            $newImageName = time() . '-' . $request->name . '.' . 
            $request->image->extension();
            $request->image->move(public_path('assets/uploads/products'),$newImageName);

        }else{
            $newImageName = $product->image;
        }

        
        $product->update([
            'name'=>$request->input('name'),
            'cate_id'=>$request->input('cate_id'),
            'slug'=>$request->input('slug'),
            'description'=>$request->input('description'),
            'small_description'=>$request->input('small_description'),
            'original_price'=>$request->input('original_price'),
            'selling_price'=>$request->input('selling_price'),
            'qty'=>$request->input('qty'),
            'tax'=>$request->input('tax'),
            'image'=>$newImageName,
            'status'=>$request->input('status') == TRUE ? '1':'0',
            'trending'=>$request->input('trending') == TRUE ? '1':'0',
            'meta_title'=>$request->input('meta_title'),
            'meta_keywords'=>$request->input('meta_keywords'),
            'meta_description'=>$request->input('meta_descrip'),

        ]);//in this way we need to make a new proparty call fillable to out model


        return redirect('products')->with('status','Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $path = 'assets/uploads/products/'.$product->image;

            if (File::exists($path)) {

                File::delete($path);
            }
        $product->delete();

        return redirect('products')->with('status','Product Deleted successfully');
    }
}
