<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\productcontroller;
use App\Http\Controllers\enquirycontroller;
use App\Http\Controllers\admincontroller;

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
    return view('welcome');
});

// Route::get('/create', function () {
//     return view('product.create');
// });


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/products/view', [admincontroller::class, 'adminshowallproducts'])->name('admin.adminview');
    Route::get('/products/{id}', [admincontroller::class, 'adminshowproduct'])->name('admin.adminshow');
    Route::delete('/products/delete/{id}', [admincontroller::class, 'admindeleteproduct'])->name('admin.product.delete');
});


Route::get('/products/create', [productcontroller::class, 'create'])->name('product.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/products/myview', [productcontroller::class, 'showallmyproducts'])->name('product.myview');
Route::delete('/products/delete/{id}', [productcontroller::class, 'deletemyproduct'])->name('product.delete');
Route::get('/products/edit/{id}', [productcontroller::class, 'edit'])->name('product.edit');
Route::get('/products/update/{id}', [productcontroller::class, 'updatedata'])->name('product.update');
Route::get('/mysearch', [productcontroller::class, 'mysearchproduct'])->name('product.myviewsearch');

Route::get('/products/view', [productcontroller::class, 'showallproducts'])->name('product.view');
//  Route::post('/products/show', [ProductController::class, 'showproduct'])->name('product.show');
Route::get('/products/{id}', [productcontroller::class, 'showproduct'])->name('product.show');
Route::get('/search', [productcontroller::class, 'searchproduct'])->name('product.viewsearch');

//Enquiry
Route::post('/products/storeenquiry', [enquirycontroller::class, 'addEnquiry'])->name('enquiry.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

