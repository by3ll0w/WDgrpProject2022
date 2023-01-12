<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\Food;
use App\Models\NoodleType;
use App\Models\Topping;
use App\Models\Order;
use App\Http\Controllers\CartController;

class FoodController extends Controller
{
    //
    public function add()
    {
        $r = request();
        $price = $this::getPrice($r->foodSize);


        $addProduct = Food::create([
            'size' => $r->foodSize,
            'quantity' => $r->foodQuantity,
            'unitPrice' => $price,
            'totalPrice' => $price * ($r->foodQuantity),
            'OrderID' => "-1",
            'Status' => "0",
            'UserID' => auth()->id(),
            'ToppingID' => $r->ToppingID,
            'NoodleTypeID' => $r->NoodleTypeID,
        ]);





        return redirect()->route('home');
    }


    public function userEdit($id)
    {
        $food = Food::find($id);
        $ToppingID=Topping::all();
        $NoodleTypeID=NoodleType::all();
        return view('UserEditFood', compact('food','ToppingID','NoodleTypeID'));
    }
    public function userUpdate($id)
    { 
        $r=request();
        $price = $this::getPrice($r->foodSize);
        
    Food::where('id',$id)->update([
        'size' => $r->foodSize,
        'quantity' => $r->foodQuantity,
        'unitPrice' => $price,
        'totalPrice' => $price * ($r->foodQuantity),
        'ToppingID' => $r->ToppingID,
        'NoodleTypeID' => $r->NoodleTypeID,
    ]);
    return redirect()->route('viewCart');
    }

    public function userDelete()
    { }




    public static function getPrice($size)
    {
        switch ($size) {
            case "S":
                return 5.00;
                break;
            case "M":
                return 7.50;
                break;
            case "L":
                return 9.00;
            default:
                return 0;
                break;
        }
    }

    public function viewItemsInCart()
    {

        $food = Food::where('UserID', auth()->id())->where('Status', "0")
            ->leftjoin('noodle_types', 'noodle_types.id', '=', 'food.NoodleTypeID')
            ->leftjoin('toppings', 'toppings.id', '=', 'food.ToppingID')
            ->select(
                'food.*',
                'noodle_types.name as Noodle',
                'food.*',
                'toppings.name as ToppingName'
            )->get();

        $total = Food::where('UserID', auth()->id())->where('Status', "0")->sum('TotalPrice');

        return view('viewCart')->with('food', $food)->with('total', $total);
    }

    public function checkout()
    {

        $key = auth()->id();


        //add new order
        $OID = Order::create([
            'UserID' => $key,
            'status' => "In Progress"
        ])->id;

        Food::where('UserID', auth()->id())->where('Status', "0")->update(['OrderID' => $OID, 'Status' => "1"]);


        return redirect()->route('home');
    }
}
