<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $featured_products= Product::where('trending','1')->take(15)->get();
        $trending_categories = Category::where('popular','1')->take(15)->get();

        return view('frontend.index',[
            'featured_products'=>$featured_products,
            'trending_categories'=>$trending_categories
        ]);
    }

    public function category(){
        $categories = Category::where('status','0')->get();
        return view('frontend.category',['categories'=>$categories]);
    }

    public function viewCategory($slug){
        if (Category::where('slug',$slug)->exists()) {
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('cate_id',$category->id)->where('status','0')->get();


            return view('frontend.products.index',['category'=>$category,'products'=>$products]);
        }else{
            return redirect('/')->with('status','Category not found !');
        }
    }

    public function viewProduct($cate_slug, $prod_slug){
        if (Category::where('slug', $cate_slug)->exists()) {
            if (Product::where('slug', $prod_slug )->exists()) {
                
                $product = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view',['product'=> $product]);

            }else{
                return redirect('/')->with('status','Product not found !');
            }

        }else{
            return redirect('/')->with('status','Category not found !');
        }
    }
}
