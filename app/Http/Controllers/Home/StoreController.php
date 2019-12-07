<?php

namespace App\Http\Controllers\Home;

use App\Repositories\Goods\GoodsContract;
use App\Repositories\Store\StoreContract;
use App\Repositories\TeamShop\TeamShopContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class StoreController extends Controller
{
    protected $storeContract;
    protected $goodsContract;
    protected $teamShopContract;
    public function __construct(StoreContract $storeContract, GoodsContract $goodsContract, TeamShopContract $teamShopContract)
    {
         $this->storeContract = $storeContract;
         $this->goodsContract = $goodsContract;
         $this->teamShopContract = $teamShopContract;
    }


    /**
     * 店铺首页
     *
     * @param int $id 店铺ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月25日
     */
    public function index($id, $uuid = 0)
    {
        if ($id < 1) {
            return redirect(url('/'));
        }
        $uuid = trim(addslashes($uuid));

        if ($uuid > 0) {
            $teamShop = $this->teamShopContract->findByUuid($uuid);
            if (!empty($teamShop)) {
                if($teamShop->store_id = $id){
                    Cookie::make('isTeamShop_'.$id,$teamShop->ts_id, 3600);
                }

            }
        }


        $store = $this->storeContract->storeInfo($id);
        if (empty($store)) {
            return redirect(url('/'));
        }
        $cateList = $store->storeCate;
        if ($cateList->isEmpty()) {
            return redirect(url('/'));
        }

        //是否
        $store['isTeamShop'] =  Cookie::get('isTeamShop_'.$id, false);

        $list = [];

        foreach ($cateList as $cateId => $cate) {
            $goodsList = $this->goodsContract->getList($id, $cate->stcate_id);
            $list[] = [
                'cate' => $cate,
                'goodsList' =>$goodsList,
            ];
        }

        return view('home.store.index',compact('store', 'list'));
    }
}
