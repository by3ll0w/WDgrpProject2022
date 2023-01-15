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

        $total = array();
        foreach ($orders as $order) {
            $total[$order->id] = Food::where('OrderID', $order->id)->sum('TotalPrice');
        }


        return view('viewOrders', compact('orders', 'items', 'total'));
    }


    public function cancelOrder($id)
    { }






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

        $total = array();
        foreach ($orders as $order) {
            $total[$order->id] = Food::where('OrderID', $order->id)->sum('TotalPrice');
        }

        return view('showOrder', compact('orders', 'items', 'users', 'total'));
    }

    public function StaffViewOrderDetail($id)
    {
        $order = Order::find($id);
        $food = Food::where('OrderID', $id)->leftjoin('noodle_types', 'noodle_types.id', '=', 'food.NoodleTypeID')
            ->leftjoin('toppings', 'toppings.id', '=', 'food.ToppingID')
            ->select(
                'food.*',
                'noodle_types.name as Noodle',
                'food.*',
                'toppings.name as ToppingName'
            )->get();

        $total = Food::where('OrderID', $id)->sum('TotalPrice');

        return view('staffViewOrderDetails', compact('order', 'food', 'total'));
    }


    public function deleteOrder($id)
    { }
}
