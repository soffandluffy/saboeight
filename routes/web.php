<?php
use App\Http\Controllers\LanguageController;
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

Route::prefix('fstundip')->group(function(){

	Route::get('veranda', 'VerandaController@veranda')->name('veranda');

});


// locale route
Route::get('lang/{locale}',[LanguageController::class, 'swap']);

Route::group(['middleware' => 'auth'], function(){

	// Prefix Admin
	Route::prefix('admin')->group(function(){

		Route::get('/', function(){
			return redirect()->route('dashboard');
		});
		Route::get('dashboard', 'Admin\DashboardController@dashboard')->name('dashboard');

		// Page Route
		// Route::get('/', 'PageController@blankPage');
		Route::get('/page-blank', 'PageController@blankPage');
		Route::get('/page-collapse', 'PageController@collapsePage');

		// acess controller
	    // Route::get('/access-control', 'AccessController@index');
	    // Route::get('/access-control/{roles}', 'AccessController@roles');

	    Route::prefix('blog')->group(function(){

	    	Route::get('index','Admin\BlogController@index')->name('admin.blog.index');
	    	Route::get('add','Admin\BlogController@add')->name('admin.blog.add');
	    	Route::post('store','Admin\BlogController@store')->name('admin.blog.store');
	    	Route::get('edit/{id}','Admin\BlogController@edit')->name('admin.blog.edit');
	    	Route::post('update/{id}','Admin\BlogController@update')->name('admin.blog.update');
	    	Route::post('delete/{id}','Admin\BlogController@delete')->name('admin.blog.delete');
	    	Route::post('publish/{id}','Admin\BlogController@publish')->name('admin.blog.publish');
	    	Route::post('draft/{id}','Admin\BlogController@draft')->name('admin.blog.draft');

	    });

	    Route::prefix('article-category')->group(function(){

	    	Route::get('index','Admin\ArticleCategoryController@index')->name('admin.artcategory.index');
	    	Route::post('store','Admin\ArticleCategoryController@store')->name('admin.artcategory.store');
	    	Route::post('update/{id}','Admin\ArticleCategoryController@update')->name('admin.artcategory.update');
	    	Route::post('delete/{id}','Admin\ArticleCategoryController@delete')->name('admin.artcategory.delete');

	    });

	    Route::prefix('user')->group(function(){

	    	Route::get('index','Admin\ArticleCategoryController@index')->name('admin.artcategory.index');
	    	Route::post('store','Admin\ArticleCategoryController@store')->name('admin.artcategory.store');
	    	Route::post('update/{id}','Admin\ArticleCategoryController@update')->name('admin.artcategory.update');
	    	Route::post('delete/{id}','Admin\ArticleCategoryController@delete')->name('admin.artcategory.delete');

	    });

	});
});

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

