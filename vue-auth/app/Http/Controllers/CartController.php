<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    public function addToCart(Request $request){

        // return "ok";
        // $quantity=1;
        // $carts= new Cart;
        // $carts->session_id= Session::getId();
        // $carts->product_id=$request->id;
        // $carts->productName=$request->productName;
        // $carts->productImage=$request->productImage;
        // $carts->salePrice=$request->salePrice;
        // $carts->quantity=$quantity;

        


        // if($carts->save()){
        //  return response()->json($carts);
        // }

       $quantity=1;
       $carts=Session::push('carts', [
        'id'=> $request->id,
        'session_id'=> Session::getId(),
        'productName'=> $request->productName,
        'productImage'=> $request->productImage,
        'salePrice'=> $request->salePrice,
        'quantity'=> $quantity,
    ]);

       return $carts;
    // $cartItems[] = $cart;
    // $req->session()->put('carts', $cartItems);
    // return view($cartItems);
    //$carts = collect([$carts]);
    //$request->session()->put('carts', $carts);

   

    //return response()->json($carts);


        // if($request->session()->put('my_name', 'Wasi')){
        //     return "Session Data Has been Added!!";
        // }else{
        //     return "something wrong";
        // }
            
        
       
    }

    public function showCart(Request $request){

        //return exec('getmac');
        
         if ($request->session()->has('carts')) {
            $carts=$request->session()->get('carts');
            return response()->json($carts);
        }
        
       // $carts= Cart::where('session_id', Session::getId())->get();
       // return $carts;
        //return response()->json($carts);

    }

    public function removeCart(Request $request){
        // $carts= Cart::find($id)->where('session_id', Session::getId());
       // $carts= Session::find($id);
        if ($request->session()->has('carts')) {
            $carts=$request->session()->forget('carts');
            return response()->json($carts);
        }else{
            return "Session is Empty";//"Cart Remove Successfully!";
        }
        //return $id;
    
        //put back in session array without deleted item
       // $request->session()->push('carts',$products);
        
        
       
         
        
    }



}
