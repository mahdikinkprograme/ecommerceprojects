<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\watchController;
use App\Http\livewire\Counter;
use App\livewire\Watch;
use App\livewire\Wath;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/watch', [watchController::class, 'watchserve']);
//Route::get('/detail/{id}', [watchController::class, 'detaile']);
//Route::get('/index', [watchController::class, 'indexs']);
//Route::post('/index', [watchController::class, 'form']);
//
//Route::post('/carts/{id}', [watchController::class,'prodect']);
//Route::delete('/prods-delcart', [watchController::class,'delet'])->name('prods.delcart');
//Route::post('/cartqty', [watchController::class,'addqty']);
//Route::get('/getprod', [watchController::class,'products']);
//Route::patch('/updatecart', [watchController::class,'changeqty'])->name('updatecart.cart');
//
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
Route::get('/watch',Watch::class);

Route::get('/wath',Wath::class);
//Route::get('/detailes/{id}', [App\livewire\Counter::class, 'detail'])
//Route::get('/watch', [App\livewire\Watch::class,]);


