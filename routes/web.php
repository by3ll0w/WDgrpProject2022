<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function () {
    return view('testing');
});






//Topping


Route::get('/addTopping', function () {
    return view('addTopping');
});

Route::post('/addTopping', [App\Http\Controllers\ToppingController::class, 'add'])->name('addTopping');

Route::get('/viewTopping', [App\Http\Controllers\ToppingController::class, 'view'])->name('viewTopping');

Route::get('/editTopping/{id}', [App\Http\Controllers\ToppingController::class, 'edit'])->name('editTopping');

Route::put('/updateTopping/{id}', [App\Http\Controllers\ToppingController::class, 'update'])->name('updateTopping');

Route::get('/deleteTopping/{id}', [App\Http\Controllers\ToppingController::class, 'delete'])->name('deleteTopping');


//NoodleType
Route::get('/addNoodleType', function () {
    return view('addNoodleType');
});

Route::post('/addNoodleType', [App\Http\Controllers\NoodleTypeController::class, 'add'])->name('addNoodleType');

Route::get('/viewNoodleType', [App\Http\Controllers\NoodleTypeController::class, 'view'])->name('viewNoodleType');

Route::get('/editNoodleType/{id}', [App\Http\Controllers\NoodleTypeController::class, 'edit'])->name('editNoodleType');

Route::put('/updateNoodleType/{id}', [App\Http\Controllers\NoodleTypeController::class, 'update'])->name('updateNoodleType');

Route::get('/deleteNoodleType/{id}', [App\Http\Controllers\NoodleTypeController::class, 'delete'])->name('deleteNoodleType');


//Food
Route::get('/newItem', function () {
    return view('addFood', ['ToppingID' => App\Models\Topping::all(), 'NoodleTypeID' => App\Models\NoodleType::all()]);
});
Route::post('/newItem', [App\Http\Controllers\FoodController::class, 'add'])->name('newItem');


Route::get('/userEditFood/{id}', [App\Http\Controllers\FoodController::class, 'userEdit'])->name('userEditFood');
Route::put('/userUpdateFood/{id}', [App\Http\Controllers\FoodController::class, 'userUpdate'])->name('userUpdateFood');


Route::get('/staffEditFood/{id}', [App\Http\Controllers\FoodController::class, 'staffEdit'])->name('staffEditFood');
Route::put('/staffUpdateFood/{id}', [App\Http\Controllers\FoodController::class, 'staffUpdate'])->name('staffUpdateFood');

Route::get('/deleteFood/{id}', [App\Http\Controllers\FoodController::class, 'delete'])->name('deleteFood');



//Cart
//Route::get('/testCart',[App\Http\Controllers\CartController::class, 'getCart'])->name('testCart');

Route::get('/viewCart', [App\Http\Controllers\FoodController::class, 'viewItemsInCart'])->name('viewCart');



//
Route::get('/checkout', [App\Http\Controllers\FoodController::class, 'checkout'])->name('checkout');


//Order
Route::get('/viewOrders', [App\Http\Controllers\OrderController::class, 'CustomerViewOrders'])->name('viewOrders');

Route::get('/showOrders', [App\Http\Controllers\OrderController::class, 'StaffViewOrders'])->name('showOrder');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/staff', function () {
    return view('staff');
});