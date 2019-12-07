<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Api\ApiV2Controller;
use App\Http\Requests\ShopCartCreateRequest;
use App\Repositories\Store\StoreContract;
use App\Repositories\TeamShop\TeamShopContract;
use App\Repositories\TeamShopExtra\TeamShopExtraContract;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class ShopCartController extends ApiV2Controller
{
    //
    protected $cart;
    protected $storeContract;
    protected $teamShopContract;
    protected $teamShopExtraContract;
    public function __construct(Cart $cart, StoreContract $storeContract,
                                TeamShopContract $teamShopContract, TeamShopExtraContract $teamShopExtraContract)
    {
        $this->cart = $cart;
        $this->storeContract = $storeContract;
        $this->teamShopContract = $teamShopContract;
        $this->teamShopExtraContract =$teamShopExtraContract;
    }

    /**
     * 添加购物车成功
     *
     * @return string
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月13日
     */
    public function create(ShopCartCreateRequest $request)
    {
        $data = $request->fillData();
        $store_id = $data['store_id'];

        $store = $this->storeContract->storeInfo($store_id);
        //判断店铺是否存在
        if (empty($store)) {
            return $this->setStatusCode(400)->responseError('店铺不存在');
        }
        //1判断是否，是团购商品
        if (Cookie::has('isTeamShop_' . $store_id)) {
            $ts_id = Cookie::get('isTeamShop_' . $store_id);
            $newPrice = $data['price'];
            $teamShop = $this->teamShopContract->find($ts_id);
            $price = $teamShop->price;
            //查询出你是否超过额度了
            $shopPrice = $this->teamShopExtraContract->getPriceByUserIdAndTId($data['user_id'], $ts_id);
            if ($newPrice + $shopPrice >= $price) {
                return $this->setStatusCode(400)->responseError('超过额度');
            }
            //开始了吧
            if ($this->teamShopExtraContract->create($data)) {
                $result['msg'] = '添加成功';
                return $this->setStatusCode(200)->responseSuccess($result);
            }
            return $this->setStatusCode(500)->responseError('添加失败');
        } else {
            //
            $type = $store->type;//如果为1 表示普通的数据
            if ($type == 0) {
                if ($this->cart->add($data['goods_id'], $data['goods_name'], $data['goods_num'],
                    $data['price'], $data['options'])
                ) {
                    $result['msg'] = '添加成功';
                    return $this->setStatusCode(200)->responseSuccess($result);
                }
                return $this->setStatusCode(500)->responseError('添加失败');
            }
            //其他团购类型的，TODO
        }
    }

}
