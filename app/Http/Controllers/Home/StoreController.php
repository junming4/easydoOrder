<?php

namespace App\Http\Controllers\Home;

use App\Repositories\Goods\GoodsContract;
use App\Repositories\Store\StoreContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    protected $storeContract;
    protected $goodsContract;
    public function __construct(StoreContract $storeContract, GoodsContract $goodsContract)
    {
         $this->storeContract = $storeContract;
         $this->goodsContract = $goodsContract;
    }


    /**
     * 店铺首页
     *
     * @param int $id 店铺ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月25日
     */
    public function index($id)
    {
        if ($id < 1) {
            return redirect(url('/'));
        }
        $store = $this->storeContract->storeInfo($id);
        if (empty($store)) {
            return redirect(url('/'));
        }
        $cateList = $store->storeCate;
        if ($cateList->isEmpty()) {
            return redirect(url('/'));
        }

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
