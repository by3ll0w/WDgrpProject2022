<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Food;
use App\Models\Order;
use App\Models\NoodleType;
use App\Models\Topping;


class OrderController extends Controller
{
    //
    public function CustomerViewOrders()
    {
        $orders = Order::where('UserID', auth()->id())->get();
        $items = Food::leftjoin('noodle_types', 'noodle_types.id', '=', 'food.NoodleTypeID')
            ->leftjoin('toppings', 'toppings.id', '=', 'food.ToppingID')
            ->select(
                'food.*',
                'noodle_types.name as Noodle',
                'food.*',
                'toppings.name as ToppingName'
            )->get();



        return view('viewOrders', compact('orders', 'items'));
    }




    public function StaffViewOrders()
    {
        $users = DB::table('users')->get();
        $orders = Order::all();


        $items = Food::leftjoin('noodle_types', 'noodle_types.id', '=', 'food.NoodleTypeID')
            ->leftjoin('toppings', 'toppings.id', '=', 'food.ToppingID')
            ->select(
                'food.*',
                'noodle_types.name as Noodle',
                'food.*',
                'toppings.name as ToppingName'
            )->get();



        return view('showOrder', compact('orders', 'items', 'users'));
    }
    public function StaffViewOrderDetail()
    { }
}
