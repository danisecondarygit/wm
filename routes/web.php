<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttributeGroupController;
use App\Http\Controllers\CategoryAttributeGroupController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\HomeController;

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

Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::group(['prefix'=>'products', 'as'=>'products.'], function(){
     Route::get('', [ProductController::class, 'search_products'])->name('search');
     Route::group(['prefix'=>'{product_id}'], function(){
      Route::group(['prefix'=>'{product_slug}'], function(){
        Route::get('', [ProductController::class, 'show_product_details'])->name('details');
      });
     });   
    });
    Route::group(['prefix'=>'panel', 'as'=>'panel.'], function(){
        Route::get('', [HomeController::class, 'show_dashboard'])->name('dashboard');
        Route::get('new-product', [ProductController::class, 'create_product'])->name('new-product');
        Route::get('new-category', [CategoryController::class, 'create_category'])->name('new-category');
        Route::post('category-save', [CategoryController::class, 'save_category'])->name('category-save');
        Route::post('product-save', [ProductController::class, 'save_product'])->name('product-save');
        Route::get('new-attribute-group', [AttributeGroupController::class, 'create_attribute_group'])->name('new-attribute-group');
        Route::post('attribute-group-save', [AttributeGroupController::class, 'save_attribute_group'])->name('attribute-group-save');
        Route::post('attribute-save', [AttributeController::class, 'save_attribute'])->name('attribute-save');
        Route::group(['prefix'=>'categories', 'as'=>'categories.'], function(){
            Route::get('', [CategoryController::class, 'manage_categories'])->name('management');
            Route::group(['prefix'=>'{category}', ], function(){
             Route::delete('', [CategoryController::class, 'delete_category'])->name('delete');
             Route::group(['prefix'=>'attribute-groups', 'as'=>'attribute-groups.'], function(){
              Route::get('', [CategoryAttributeGroupController::class, 
               'manage_attribute_groups_of_category'])->name('management');  
              Route::group(['prefix'=>'{attribute_group}'], function(){
                Route::post('', [CategoryAttributeGroupController::class, 'attach_attribute_group_to_category'])->name('attachment');
                Route::delete('', [CategoryAttributeGroupController::class, 'detach_attribute_group_from_category'])->name('detachment');
              }); 
             });
            });
        });
        Route::group(['prefix'=>'products', 'as'=>'products.'], function(){
         Route::get('', [ProductController::class, 'manage_products'])->name('management');
         Route::group(['prefix'=>'{product}'], function(){
            Route::delete('', [ProductController::class, 'delete_product'])->name('delete');
            Route::group(['prefix'=>'attributes', 'as'=>'attributes.'], function(){
             Route::get('', [ProductAttributeController::class, 'manage_attributes_of_product'])->name('management');   
             Route::group(['prefix'=>'{attribute}'], function(){
              Route::post('', [ProductAttributeController::class, 'attach_attribute_to_product'])->name('attachment');
              Route::delete('', [ProductAttributeController::class, 'detach_attribute_from_product'])->name('detachment');
             });
            });
         });
        });
        Route::group(['prefix'=>'attribute-groups', 'as'=>'attribute-groups.'], function(){
         Route::get('', [AttributeGroupController::class, 'manage'])->name('management');  
         Route::group(['prefix'=>'{attribute_group}'], function(){
            Route::delete('', [AttributeGroupController::class, 'delete_attribute_group'])->name('delete');
            Route::get('new-attribute', [AttributeController::class, 'create_attribute'])->name('new-attribute');
            Route::group(['prefix'=>'attributes', 'as'=>'attributes.'], function(){
             Route::get('', [AttributeController::class, 'manage_attributes_of_attribute_group'])->name('management');
            });
         });  
        });
    });
});