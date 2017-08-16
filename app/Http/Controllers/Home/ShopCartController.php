<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ShopCartCreateRequest;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Cart;


class ShopCartController extends Controller
{
    protected $cart;
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    //

    /**
     * 添加购物车成功
     *
     * @param ShopCartCreateRequest $request
     * @return string
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月13日
     */
    public function create(ShopCartCreateRequest $request)
    {
        $data = $request->fillData();
        $row = $this->cart->add($data['goods_id'],$data['goods_name'],$data['goods_num'],
            $data['price'], $data['options']);

        if($row){
            exit("添加成功!");
        }
        return "no";
    }

    public function update()
    {
        //更新数量的
    }
    
}
