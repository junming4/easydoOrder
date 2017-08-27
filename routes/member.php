<?php
/**
 * 会员路由器
 */

Route::group(['prefix'=>'member', 'namespace' => 'Member','middleware' => 'auth.member'], function ($route) {
    //收藏部分
    $route->get('collection/list',['as'=>'member.collection.index','uses' =>'CollectionController@index']);
    //共享购物车部分
    $route->get('cart/create', ['as' => 'member.cart.create', 'uses' => 'CartController@create']);
    $route->post('cart/store', ['as' => 'member.cart.store', 'uses' => 'CartController@store']);
    $route->put('cart/update/{id?}', ['as' => 'member.cart.update', 'uses' => 'CartController@update']);
});
