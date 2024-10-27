<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});
// BaseController's routes
Route::get('/' ,[BaseController::Class,'home'])->name('home');

Route::get('/shop' ,[BaseController::Class,'shop'])->name('shop');

Route::get('/aboutus' ,[BaseController::Class,'aboutus'])->name('aboutus');

Route::get('/contactus' ,[BaseController::Class,'contactus'])->name('contactus');

Route::get('/cart' ,[BaseController::Class,'cart'])->name('cart');

Route::get('/productview' ,[BaseController::Class,'productview'])->name('productview');
// AdminController's routes
Route::get('/admin/login' ,[AdminController::Class,'login'])->name('admin.login');

Route::post('/admin/login' ,[AdminController::Class,'makeLogin'])->name('admin.makeLogin');
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::group(['middleware' =>'auth'],function(){
    Route::get('/admin/dashboard' ,[AdminController::Class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout' ,[AdminController::Class,'logout'])->name('admin.logout');

    // CategoryController route
    Route::get('/categories' ,[CategoryController::Class,'index'])->name('category.list');
    
    Route::get('/category/add' ,[CategoryController::Class,'create'])->name('category.create');
    
    Route::post('/category/add' ,[CategoryController::Class,'store'])->name('category.store');

    Route::get('/categories/edit/{id}' ,[CategoryController::Class,'edit'])->name('category.edit');
    Route::post('/categories/edit/{id}' ,[CategoryController::Class,'update'])->name('category.update');
    Route::post('/category/delete' ,[CategoryController::Class,'destroy'])->name('category.delete');

    // ProductsController route
    Route::get('/products', [ProductsController::class, 'index'])->name('product.list');
    Route::get('/product/create', [ProductsController::class, 'create'])->name('product.create');
    Route::post('/product/create', [ProductsController::class, 'store'])->name('product.store');
    Route::get('/product/edit{id}', [ProductsController::class, 'edit'])->name('product.edit');
    Route::post('/product/edit{id}', [ProductsController::class, 'update'])->name('product.update');
    Route::post('/product/delete', [ProductsController::class, 'destroy'])->name('product.delete');
    Route::get('/product/details{id}', [ProductsController::class, 'extraDetails'])->name('product.extraDetails');
    Route::post('/product/details{id}', [ProductsController::class, 'extraDetailsStore'])->name('product.extraDetailsStore');

});
