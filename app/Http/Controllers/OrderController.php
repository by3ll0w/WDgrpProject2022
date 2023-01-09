<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Food;
use App\Models\Order;


class OrderController extends Controller
{
    //
public function CustomerViewOrders(){
    $order=Order::where('UserID',auth()->id())->get();
    return view('viewOrders')->with('orders',$order);
}

public function CustomerViewOrderDetail(){

}


public function StaffViewOrders(){
    $order=Order::all();
    return view('showOrder')->with('orders',$order);
}
public function StaffViewOrderDetail(){
    
}

}



