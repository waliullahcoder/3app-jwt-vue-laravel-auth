<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
class FrontendController extends Controller
{
    public function frontProductList(){
        $products= Product::all();
        return response()->json($products);
       
    }
}
