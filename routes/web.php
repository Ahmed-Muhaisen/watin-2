<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RestaurantController;

use App\Http\Controllers\setting\RoleController;
use App\Http\Controllers\setting\RoleUserController;
use App\Http\Controllers\setting\PermissionController;
use App\Http\Controllers\setting\RolePermissionController;

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

Route::prefix('')->group(function(){
    Route::get('login',[LoginController::class,'login'])->name('login');
    Route::post('login-post',[LoginController::class,'login_validate'])->name('login_validate');

    Route::get('register',[LoginController::class,'register'])->name('register');

    Route::post('register-post',[LoginController::class,'register_validate'])->name('register_validate');

});

Route::get('confirm/{id}/dsdvx',[LoginController::class,'confirm'])->name('confirm');

Route::get('logout',[LoginController::class,'logout'])->name('logout');

Route::get('/',[WebsiteController::class,'index'])->name('index');

Route::prefix('website')->name('website.')->group(function(){

    Route::get('contact',[WebsiteController::class,'contact'])->name('contact');
    Route::post('contact',[WebsiteController::class,'contact_post']);
    Route::get('about',[WebsiteController::class,'about'])->name('about');
    Route::get('best_products',[WebsiteController::class,'best_products'])->name('best_products');

    Route::get('all_restaurants',[WebsiteController::class,'all_restaurants'])->name('all_restaurants');
    Route::get('Website/restaurant/{id}',[WebsiteController::class,'restaurant'])->name('restaurant');

    Route::get('product/{product:name}',[WebsiteController::class,'product'])->name('product');

    Route::get('my_Cards',[WebsiteController::class,'my_Cards'])->name('my_Cards');

    Route::post('payCard',[WebsiteController::class,'payCard'])->middleware('auth')->name('payCard');

    Route::post('stripe',[WebsiteController::class,'stripe'])->middleware('auth')->name('stripe');

    Route::post('stripePost',[WebsiteController::class,'stripePost'])->middleware('auth')->name('stripe.post');

    Route::post('payCard',[WebsiteController::class,'payCard'])->middleware('auth')->name('payCard');


    Route::post('addToCard/{product:id}',[WebsiteController::class,'addToCard'])->middleware('auth')->name('addToCard');

    Route::delete('deleteFromCard/{id}',[WebsiteController::class,'deleteFromCard'])->middleware('auth')->name('deleteFromCard');

});







Route::prefix('admin')->name('admin.')->middleware('auth','admin')->group(function(){

Route::get('/',[AdminController::class,'index'])->name('index');

Route::get('Restaurant/trash',[RestaurantController::class,'trash'])->name('Restaurant.trash');
Route::get('Restaurant/restore/{id}',[RestaurantController::class,'restore'])->name('Restaurant.restore');
Route::delete('Restaurant/forceDelete/{id}',[RestaurantController::class,'forceDelete'])->name('Restaurant.forceDelete');
Route::resource('Restaurant',RestaurantController::class);



Route::get('user/trash',[UserController::class,'trash'])->name('user.trash');
Route::get('user/restore/{id}',[UserController::class,'restore'])->name('user.restore');
Route::delete('user/forceDelete/{id}',[UserController::class,'forceDelete'])->name('user.forceDelete');

Route::resource('user',UserController::class);



Route::get('employee/trash',[EmployeeController::class,'trash'])->name('employee.trash');
Route::get('employee/restore/{id}',[EmployeeController::class,'restore'])->name('employee.restore');
Route::delete('employee/forceDelete/{id}',[EmployeeController::class,'forceDelete'])->name('employee.forceDelete');

Route::resource('employee',EmployeeController::class);



Route::get('category/trash',[CategoryController::class,'trash'])->name('category.trash');
Route::get('category/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
Route::delete('category/forceDelete/{id}',[CategoryController::class,'forceDelete'])->name('category.forceDelete');
Route::resource('category',CategoryController::class);


Route::get('product/trash',[ProductController::class,'trash'])->name('product.trash');
Route::get('product/restore/{id}',[ProductController::class,'restore'])->name('product.restore');
Route::delete('product/forceDelete/{id}',[ProductController::class,'forceDelete'])->name('product.forceDelete');
Route::resource('product',ProductController::class);


Route::get('order/trash',[OrderController::class,'trash'])->name('order.trash');
Route::get('order/restore/{id}/{user_id}',[OrderController::class,'restore'])->name('order.restore');
Route::delete('order/forceDelete/{id}/{user_id}',[OrderController::class,'forceDelete'])->name('order.forceDelete');

Route::get('order/{id}/{user}/edit',[OrderController::class,'edit'])->name('order.edit_order');

Route::delete('order/{id}/{user}/destroy',[OrderController::class,'destroy'])->name('order.destroy_order');
Route::resource('order',OrderController::class);


Route::prefix('setting')->name('setting.')->group(function(){
Route::get('role_permission/trash',[RolePermissionController::class,'trash'])->name('role_permission.trash');
Route::get('role_permission/restore/{id}',[RolePermissionController::class,'restore'])->name('role_permission.restore');
Route::delete('role_permission/forceDelete/{id}',[RolePermissionController::class,'forceDelete'])->name('role_permission.forceDelete');
Route::resource('role_permission', RolePermissionController::class);


Route::get('role_user/trash',[RoleUserController::class,'trash'])->name('role_user.trash');
Route::get('role_user/restore/{id}',[RoleUserController::class,'restore'])->name('role_user.restore');
Route::delete('role_user/forceDelete/{id}',[RoleUserController::class,'forceDelete'])->name('role_user.forceDelete');
Route::resource('role_user', RoleUserController::class);



Route::get('role/trash',[RoleController::class,'trash'])->name('role.trash');
Route::get('role/restore/{id}',[RoleController::class,'restore'])->name('role.restore');
Route::delete('role/forceDelete/{id}',[RoleController::class,'forceDelete'])->name('role.forceDelete');
Route::resource('role',RoleController::class);


Route::get('permission/trash',[PermissionController::class,'trash'])->name('permission.trash');
Route::get('permission/restore/{id}',[PermissionController::class,'restore'])->name('permission.restore');
Route::delete('permission/forceDelete/{id}',[PermissionController::class,'forceDelete'])->name('permission.forceDelete');
Route::resource('permission',PermissionController::class);


});
});


