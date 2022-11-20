<?php

namespace Wooturk;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
class ProductServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Route::get('/product', [UserController::class, 'index'])->name('product-index');
		Route::group(['middleware' => ['auth:sanctum','wooturk.gateway']], function(){
			Route::post('/product', [UserController::class, 'post'])->name('product-create');
			Route::get('/products', [UserController::class, 'list'])->name('product-list');
			Route::get('/product/{id}', [UserController::class, 'get'])->name('product-get');
			Route::put('/product/{id}', [UserController::class, 'put'])->name('product-update');
			Route::delete('/product/{id}', [UserController::class, 'delete'])->name('product-delete');
		});
	}
}
