<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\Food;
use App\Models\Cart;
use App\Models\NoodleType;
use App\Models\Topping;
use App\Http\Controllers\CartController;

class FoodController extends Controller
{
    //
    public function add()
    {
        $r = request();
        $price=$this::getPrice($r->foodSize);


        $addProduct = Food::create([
            'size' => $r->foodSize,
            'quantity' => $r->foodQuantity,
            'unitPrice' => $price,
            'totalPrice' => $price * ($r->foodQuantity),
            'OrderID'=>"-1",
            'Status'=>"0",
            'UserID'=>auth()->id(),
            'ToppingID' => $r->ToppingID,
            'NoodleTypeID' => $r->NoodleTypeID,
            
        

        ]);

           

        Session::flash('success', "Product created successfully!");

        return redirect()->route('home');
    }


    public function edit(){

    }

   public function delete(){
    
   }




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
}
