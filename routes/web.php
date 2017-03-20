<?php

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

// Trang chủ
Route::get('/','MyController@index');
// Chi tiết sản phẩm
Route::get('san-pham-{id}','MyController@detail');
// Danh sách sản phẩm thuộc chuyên mục
Route::get('chuyen-muc-{id}','MyController@product_list');
// Liên hệ
Route::get('lien-he','MyController@contact');
// Gửi form liên hệ
Route::get('sendContact','MyController@sendContact');


/*------ ------------ ----------- --------- ------------
Các Module xử lý
------ ------------ ----------- --------- ------------*/
// Trả vế kết quả tìm kiếm
Route::get('search','MyController@search');
// 
//Liên hệ

Route::get('lien-he', ['as' => 'getLienHe', 'uses' => 'MyController@get_lienhe']);
Route::post('lien-he', ['as' => 'postLienHe', 'uses' => 'MyController@post_lienhe']);
/*------------------ Route cho Admin -----------------------*/

Route::get('test',function(){

    return view ('layouts.admin.cate.danhsach');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'cate'], function ()   {
       Route::get('danhsach', 'CateController@danhsach');
       Route::get('xoa/{id}', 'CateController@xoa');
       Route::get('sua/{id}', 'CateController@sua');
       Route::post('sua/{id}', 'CateController@postsua');
       Route::get('them', 'CateController@them');
       Route::post('them', 'CateController@postthem');
    });
    
   Route::group(['prefix' => 'product'], function ()   {
       Route::get('list', 'Admin_Product_Controller@admin_product_list');
       
       Route::get('edit{$id}', 'Admin_Product_Controller@admin_product_edit');
	   
       Route::get('delete{$id}', 'Admin_Product_Controller@admin_product_delete');
       
       Route::get('add', 'Admin_Product_Controller@admin_product_add');
	   
       Route::post('add', 'Admin_Product_Controller@admin_product_add_post');
    });
   
     Route::group(['prefix' => 'slide'], function ()   {
       Route::get('danhsach', 'SlideController@danhsach');
       
       Route::get('sua/{id}', 'SlideController@sua');
       Route::post('sua/{id}', 'SlideController@postsua');
         Route::get('xoa/{id}', 'SlideController@xoa');
       Route::get('them', 'SlideController@them');
       Route::post('them', 'SlideController@postthem');
    });
    
     Route::group(['prefix' => 'user'], function ()   {
       Route::get('danhsach', 'SlideController@danhsach');
       
       Route::get('sua', 'SlideController@sua');
       
       Route::get('them', 'SlideController@them');
    });
    
 });