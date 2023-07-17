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

Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'web'], function () {

        //Home
        Route::get('/home', 'IndexController@index')->name('home');

        //All Resources
        Route::resources([
            'product' =>  'ProductController',
            'user' =>  'UserController',
            'coupon' =>  'CouponController'
        ]);

        //Except Show
        Route::resources([
            'category' =>  'CategoryController',
            'city' =>  'CityController',
            'color' =>  'ColorController',
            'material' =>  'MaterialController',
            'sole' =>  'SoleController',
            'size' =>  'SizeController',
            'shoe_model' =>  'ShoeModelController'
        ], ['except' => ['show']]);

        //Only [index-store-update]
        Route::resources([
            'about' =>  'AboutController',
            'setting' =>  'SettingController'
        ], ['only' => ['index', 'store', 'update']]);

        //Only [index-show]
        Route::resources([
            'order' =>  'OrderController',
            'contact_us' =>  'ContactUsController'
        ], ['only' => ['index', 'show', 'destroy']]);

        //Except [index-create-show]
        Route::resources([
            'sub_category' => 'SubCategoryController',
            'district' => 'DistrictController',
            'product_size' => 'ProductSizeController',
            'product_image' => 'ProductImageController'
        ], ['except' => ['index', 'create', 'show']]);

        /**
         * Sub Category Routes
         */
        Route::get('sub_category/{parent_id}', 'SubCategoryController@index')->name('sub_category.index');
        Route::get('sub_category/{parent_id}/create', 'SubCategoryController@create')->name('sub_category.create');
        /**
         * END
         */

        /**
         * District Routes
         */
        Route::get('district/{city_id}', 'DistrictController@index')->name('district.index');
        Route::get('district/{city_id}/create', 'DistrictController@create')->name('district.create');
        /**
         * END
         */

        /**
         * Product Images Routes
         */
        Route::get('product_image/{product_id}', 'ProductImageController@index')->name('product_image.index');
        Route::get('product_image/{product_id}/create', 'ProductImageController@create')->name('product_image.create');
        /**
         * END
         */

        /**
         * Product Images Routes
         */
        Route::get('product_size/{product_id}', 'ProductSizeController@index')->name('product_size.index');
        Route::get('product_size/{product_id}/create', 'ProductSizeController@create')->name('product_size.create');
        /**
         * END
         */

        /**
         * Change Order Status
         */
        Route::get('order/status/{order_id}/{status}', 'OrderController@updateStatus')->name('order.status');
        /**
         * End
         */


        /**
         * Global Status Change
         */
        Route::get('status/{status}/{db}/{id}', 'ChangeStatusController@status')->name('changeStatus');
        /**
         * End
         */

        /**
         * Address Routes
         */
        Route::get('user/{user_id}/addresses', 'AddressController@index')->name('address.index');
        Route::get('user/{user_id}/address/create', 'AddressController@create')->name('address.create');
        Route::post('address/store', 'AddressController@store')->name('address.store');
        Route::post('address/{id}', 'AddressController@update')->name('address.update');
        Route::get('address/{id}/edit', 'AddressController@edit')->name('address.edit');
        Route::get('address/show/{id}', 'AddressController@show')->name('address.show');
        Route::post('fetch-districts', 'AddressController@fetch_districts')->name('fetch-districts');
        Route::delete('address/{id}', 'AddressController@destroy')->name('address.delete');

        /**
         * End
         */
    });
});
