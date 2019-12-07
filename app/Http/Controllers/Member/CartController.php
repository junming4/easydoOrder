<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests\ShopCreateRequest;
use App\Repositories\TeamShop\TeamShopContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Date\Date;
use Ramsey\Uuid\Uuid;

/**
 * CartController
 *
 * @author 肖俊明<xiaojunming@eelly.net>
 * @since  2017年08月27日
 * @version 1.0
 */
class CartController extends Controller
{
    /**
     * teamShopContract
     *
     * @var TeamShopContract
     */
    protected $teamShopContract;

    /**
     * CartController constructor.
     * @param TeamShopContract $teamShopContract
     */
    public function __construct(TeamShopContract $teamShopContract)
    {
        $this->teamShopContract = $teamShopContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {

        $teamShop = [];

        $teamShop['store_id'] = $store_id = 2;
        $teamShop['uuid'] = $uuid = Uuid::uuid1()->toString();
        $teamShop['url'] = url("/store/{$store_id}/" . $uuid);

        $teamShop['team_time'] = date('Y-m-d');

        //列出时间
        $dateList = getDateForShop();

        return view('member.cart.create', compact('dateList'))->with($teamShop);
    }


    /**
     * store
     *
     * @param ShopCreateRequest $request
     * @return $this
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月27日
     */
    public function store(ShopCreateRequest $request)
    {
        $res = $this->teamShopContract->create($request->fillData());
        if ($res) {
            return Redirect::to(route(['member.cart.edit', 1]))->withInput()->withSuccess('操作成功！');
        }
        return Redirect::back()->withInput()->withErrors('操作失败！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
