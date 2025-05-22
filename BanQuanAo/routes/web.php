<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\OrderdetailsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/quan-tri/hinhsanpham', [HinhSanphamController::class, 'index'])
// ->name('admin.hinhsanpham.index');
// Route::get('/quan-tri/hinhsanpham/them-moi' , [HinhSanphamController::class, 'create'])
// ->name('admin.hinhsanpham.create');
// Route::post('/quan-tri/hinhsanpham/them-moi/luu', [HinhSanphamController::class, 'store'])
// ->name('admin.hinhsanpham.store');
// Route::delete('/quan-tri/hinhsanpham/xoa/{hsp_ma}', [HinhSanphamController::class, 'destroy'])
// ->name('admin.hinhsanpham.destroy');
// Route::get('/quan-tri/hinhsanpham/sua/{hsp_ma}', [HinhSanphamController::class, 'edit'])
// ->name('admin.hinhsanpham.edit');
// Route::put('/quan-tri/hinhsanpham/sua/{hsp_ma}/luu', [HinhSanphamController::class, 'update'])
// ->name('admin.hinhsanpham.update');


//Admin
Route::get('/admin', function () {
    return view('admin.Admin');
})->name('admin.dashboard');

Route::get('/admin/categories', [CategoriesController::class, 'index'])
->name('admin.categories.index');
Route::get('/admin/categories/new', [CategoriesController::class, 'create'])
->name('admin.categories.create');
Route::post('/admin/categories', [CategoriesController::class, 'store'])
->name('admin.categories.store');
Route::get('/admin/categories/{id}', [CategoriesController::class, 'show'])
->name('admin.categories.show');
Route::get('/admin/categories/{id}/edit', [CategoriesController::class, 'edit'])
->name('admin.categories.edit');
Route::put('/admin/categories/{id}', [CategoriesController::class, 'update'])
->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [CategoriesController::class, 'destroy'])
->name('admin.categories.destroy');

// Customers routes
Route::get('/admin/customers', [CustomersController::class, 'index'])
->name('admin.customers.index');
Route::get('/admin/customers/new', [CustomersController::class, 'create'])
->name('admin.customers.create');
Route::post('/admin/customers', [CustomersController::class, 'store'])
->name('admin.customers.store');
Route::get('/admin/customers/{id}', [CustomersController::class, 'show'])
->name('admin.customers.show');
Route::get('/admin/customers/{id}/edit', [CustomersController::class, 'edit'])
->name('admin.customers.edit');
Route::put('/admin/customers/{id}', [CustomersController::class, 'update'])
->name('admin.customers.update');
Route::delete('/admin/customers/{id}', [CustomersController::class, 'destroy'])
->name('admin.customers.destroy');

// Orders routes
Route::get('/admin/orders', [OrdersController::class, 'index'])
->name('admin.orders.index');
Route::get('/admin/orders/new', [OrdersController::class, 'create'])
->name('admin.orders.create');
Route::post('/admin/orders', [OrdersController::class, 'store'])
->name('admin.orders.store');
Route::get('/admin/orders/{id}', [OrdersController::class, 'show'])
->name('admin.orders.show');
Route::get('/admin/orders/{id}/edit', [OrdersController::class, 'edit'])
->name('admin.orders.edit');
Route::put('/admin/orders/{id}', [OrdersController::class, 'update'])
->name('admin.orders.update');
Route::delete('/admin/orders/{id}', [OrdersController::class, 'destroy'])
->name('admin.orders.destroy');

// Orderdetails routes
Route::get('/admin/orderdetails', [OrderdetailsController::class, 'index'])
->name('admin.orderdetails.index');
Route::get('/admin/orderdetails/new', [OrderdetailsController::class, 'create'])
->name('admin.orderdetails.create');
Route::post('/admin/orderdetails', [OrderdetailsController::class, 'store'])
->name('admin.orderdetails.store');
Route::get('/admin/orderdetails/{id}', [OrderdetailsController::class, 'show'])
->name('admin.orderdetails.show');
Route::get('/admin/orderdetails/{id}/edit', [OrderdetailsController::class, 'edit'])
->name('admin.orderdetails.edit');
Route::put('/admin/orderdetails/{id}', [OrderdetailsController::class, 'update'])
->name('admin.orderdetails.update');
Route::delete('/admin/orderdetails/{id}', [OrderdetailsController::class, 'destroy'])
->name('admin.orderdetails.destroy');

// Products routes
Route::get('/admin/products', [ProductsController::class, 'index'])
->name('admin.products.index');
Route::get('/admin/products/new', [ProductsController::class, 'create'])
->name('admin.products.create');
Route::post('/admin/products', [ProductsController::class, 'store'])
->name('admin.products.store');
Route::get('/admin/products/{id}', [ProductsController::class, 'show'])
->name('admin.products.show');
Route::get('/admin/products/{id}/edit', [ProductsController::class, 'edit'])
->name('admin.products.edit');
Route::put('/admin/products/{id}', [ProductsController::class, 'update'])
->name('admin.products.update');
Route::delete('/admin/products/{id}', [ProductsController::class, 'destroy'])
->name('admin.products.destroy');

// Brands routes
Route::get('/admin/brands', [BrandsController::class, 'index'])
    ->name('admin.brands.index');
Route::get('/admin/brands/new', [BrandsController::class, 'create'])
    ->name('admin.brands.create');
Route::post('/admin/brands', [BrandsController::class, 'store'])
    ->name('admin.brands.store');
Route::get('/admin/brands/{id}/edit', [BrandsController::class, 'edit'])
    ->name('admin.brands.edit');
Route::put('/admin/brands/{id}', [BrandsController::class, 'update'])
    ->name('admin.brands.update');
Route::delete('/admin/brands/{id}', [BrandsController::class, 'destroy'])
    ->name('admin.brands.destroy');