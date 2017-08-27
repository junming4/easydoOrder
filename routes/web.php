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

//Route::get('/', function () {
    //return view('welcome');
    //return view('vue');
    //$res = \App\Models\User::find(2);
    //dump($res);

    //$res = (new \App\Models\TestMongo)->createInfo();
    //var_dump($res);

    /*$res = \App\Models\User::create([
        'user_name' => '肖俊明',
        'mobile' => '13512719787',
        'email' => '2284876299@qq.com',
        'password' => 13333
    ]);

    dump($res);*/
    /*for ($i=0; $i <= 1000; $i++){
        $this->dispatch(new \App\Jobs\TestJob());
    }*/

  //  return "wellcome ";
//});

Route::get('/test',function (){

    Mail::to('13512719787@163.com')->send(new \App\Mail\SendEmail('13512719787@163.com','base'));

    exit;

    Cart::add('192ao12', 'Product 1', 1, 9.99);
    Cart::add('192ao12', 'Product 1', 3, 9.9, ['size' => 'large']);
    Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);
    dd(Cart::content());
    //::add()
});

/*Route::get('/isEmail',function (){
   $res =  isEmail('2284876299@qq.com');
   if($res) {
       return "ok";
   }else{
       return "no";
   }
});*/




//前端数据
Route::group(['namespace' => 'Home'], function ($route) {

    $route->get('/','IndexController@index');
    $route->post('shop/create',['as'=>'create','uses' => 'ShopController@create']);
    $route->post('shop/createExtra',['as'=>'create','uses' => 'ShopController@createShopExtraInfo']);
    $route->post('shop/cart/add',['as'=>'create','uses' => 'ShopCartController@create']);

    $route->get('store/{id?}',['as'=>'store','uses'=>'StoreController@index']);

    //注册
    $route->get('register','Auth\RegisterController@showRegistrationForm');
    $route->post('register','Auth\RegisterController@register');
    //登录
    $route->get('login', ['as' => 'member.login', 'uses' => 'Auth\LoginController@showLoginForm']);
    $route->post('login', ['as' => 'member.login', 'uses' => 'Auth\LoginController@login']);


});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
