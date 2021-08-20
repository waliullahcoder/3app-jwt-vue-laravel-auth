<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


     //Category================
    public function categoryStore(Request $request){
        $categories= new Category;
        $categories->categoryName= $request->categoryName;
        if($categories->save()){
         return response()->json($categories);
        }
    }
    public function categoryList(){
        $categories= Category::all();
        return response()->json($categories);
    }

    public function categoryUpdate(Request $request){
        $categories= Category::find($request->id);
        $categories->categoryName= $request->categoryName;
        if($categories->save()){
         return "OK";
        }
    }
    public function removeCategory($id){
        $categories= Category::find($id);
        if($categories->delete()){
         return "OK";
        }
    }


    //Product================
    public function productStore(Request $request){
        $products= new Product;
        $products->categoryId= $request->categoryId;
        $products->productName= $request->productName;
        $products->purchasePrice= $request->purchasePrice;
        $products->salePrice= $request->salePrice;
        $products->description= $request->description;

        if ($request->hasFile('photo')) {
            $productimage = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(('product_uploads'), $productimage);
            $products->productImage=$productimage;
        }
        if($products->save()){
            return response()->json($products);
        }
    }


    public function productList(){
        $products= Product::all();
        return response()->json($products);
       
    }

    public function productUpdate(Request $request){
        $products= Product::find($request->id);
        $products->categoryId= $request->categoryId;
        $products->productName= $request->productName;
        $products->purchasePrice= $request->purchasePrice;
        $products->salePrice= $request->salePrice;
        $products->description= $request->description;

        if ($request->hasFile('photo')) {
            $productimage = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(('product_uploads'), $productimage);
            $products->productImage=$productimage;
        }
        if($products->save()){
         return "OK";
        }
    }

    public function removeProduct($id){
        $products= Product::find($id);
        if($products->delete()){
         return "OK";
        }
    }




}
