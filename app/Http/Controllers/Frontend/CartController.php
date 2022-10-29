<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request){

        $product_id = $request->product_id;
        $product_qty = $request->product_qty;

        if(Auth::check()){
            $prod_check = Product::where('id',$product_id)->first();

            if ($prod_check) {

                if (Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()) {
                    return response()->json(['status'=> $prod_check->name .', Already Added to Cart']);
                }else{
                    Cart::create([
                        'prod_id' => $product_id,
                        'prod_qty' => $product_qty,
                        'user_id' => Auth::id(),
                    ]);

                    return response()->json(['status'=> $prod_check->name .'Added to Cart']);
                }
            }
        }else{
            
            return response()->json(['status'=> 'Please Login to Continue']);
        }
    }

    public function viewCart(){
        $cart_items = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart', compact('cart_items'));
    }

    public function deleteProduct(Request $request){
        if(Auth::check()){
           $prod_id = $request->input('prod_id');
           if (Cart::where('prod_id',$prod_id)->where('user_id', Auth::id())->exists()) {
                $cartitem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartitem->delete();
                return response()->json(['status'=> 'Product Deleted Successfully']);
           }
        }else{
            
            return response()->json(['status'=> 'Please Login to Continue']);
        }
    }
}
