<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppBindServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->_registerBindings();
    }


    /**
     * _registerBindings
     *
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月10日
     */
    private function _registerBindings()
    {

        $this->app->bind('App\Repositories\User\UserContract'
            , 'App\Repositories\User\UserRepository');//用户表
        $this->app->bind('App\Repositories\TeamShop\TeamShopContract',
            'App\Repositories\TeamShop\TeamShopRepository');//共享购物车
        $this->app->bind('App\Repositories\TeamShopExtra\TeamShopExtraContract',
            'App\Repositories\TeamShopExtra\TeamShopExtraRepository');//共享购物车序列
        $this->app->bind('App\Repositories\SendEmail\SendEmailContract',
            'App\Repositories\SendEmail\SendEmailRepository');//发送验证码类
        $this->app->bind('App\Repositories\Store\StoreContract',
            'App\Repositories\Store\StoreRepository');//店铺类
        $this->app->bind('App\Repositories\Goods\GoodsContract',
            'App\Repositories\Goods\GoodsRepository');//商品类
        $this->app->bind('App\Repositories\Collection\CollectionContract',
            'App\Repositories\Collection\CollectionRepository');//收藏类
    }
}
