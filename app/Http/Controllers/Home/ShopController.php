<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ShopCreateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopExtraCreateRequest;
use App\Repositories\TeamShop\TeamShopContract;
use App\Repositories\TeamShopExtra\ShopCartContract;

class ShopController extends Controller
{
    protected $teamShopContract;
    protected $teamShopExtraContract;
    public function __construct(TeamShopContract $teamShopContract, ShopCartContract $teamShopExtraContract)
    {
        $this->teamShopContract = $teamShopContract;
        $this->teamShopExtraContract = $teamShopExtraContract;
    }
    //
    public function index()
    {
        //去开始创建共享购物车
        return "index";
    }

    /**
     * 提交成功
     *
     * @param ShopCreateRequest $request
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月10日
     */
    public function create(ShopCreateRequest $request)
    {

        $res = $this->teamShopContract->create($request->fillData());
        if ($res) {
           //TODO 添加成功
        }
        //添加失败
    }

    public function findInfo()
    {
        //获取一条购物车数据
    }


    public function createShopExtraInfo(ShopExtraCreateRequest $request)
    {
        $data = $request->fillData();
        $ts_id = $data['ts_id'];
        $user_id = $data['user_id'];
        $newPrice = $data['price'];
        $teamShop = $this->teamShopContract->find($ts_id);
        if (empty($teamShop)) {
            exit("非法操作"); //todo
        }
        //todo 这里也需要判断是否已经过期了
        $price = $teamShop->price;
        //查询出你是否超过额度了
        $shopPrice = $this->teamShopExtraContract->getPriceByUserIdAndTId($user_id, $ts_id);

        if ($newPrice + $shopPrice >= $price) {
            exit("你已经超额");
        }
        if ($this->teamShopExtraContract->create($data)) {
            exit("创建成功!!");
        }
        echo "创建失败！";
    }

    
}
