<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->roleStatus == 1){
            return view('home');
        } elseif(Auth::user()->roleStatus ==2){
            return redirect('/dashboard');
        }elseif(Auth::user()->roleStatus == 3){
            return view('homeClient');
        }else{
            return view('home');
        }

        //return view('home');
    }
    public function user(){
        $users= Auth::user();
        return response()->json($users);
    }
    public function userList(){
        $allusers= User::all();
        return response()->json($allusers);
    }

    public function orderList(){
        $orders= Order::all();
        return response()->json($orders);
    }

    public function orders(Request $request){
        //return $request;
       $carts= $request->carts;

       $orders = new Order;
       $orders->user_id = Auth::user()->id;
       $orders->products = json_encode($carts);
       $orders->sub_total = $request->subtotal;
       $orders->tax_total = $request->taxtotal;
       $orders->grand_total = $request->grandtotal;

       //return $orders;

       if($orders->save()){
        $request->session()->forget('carts');
        return "Success";
       }else{
        return "Error";
       }


    
     
    }

    // public function categoryStore(Request $request){

    //     return $request;
    // }
}
