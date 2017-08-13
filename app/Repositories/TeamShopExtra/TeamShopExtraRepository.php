<?php


namespace App\Repositories\TeamShopExtra;

use App\Models\TeamShopExtra;

class TeamShopExtraRepository implements TeamShopExtraContract
{

    /**
     * 创建数据
     *
     * @param array $input
     * @return bool
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月10日
     */
    public function create(array $input): bool
    {
        $teamShop = TeamShopExtra::create($input);
        if ($teamShop->save()) {
            return true;
        }
        return false;
    }

    /**
     * 获取基础数据
     *
     * @param int $ts_id
     * @return TeamShopExtra
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月10日
     */
    public function find(int $ts_id): TeamShopExtra
    {
        return TeamShopExtra::find($ts_id);
    }

    /**
     * getPriceByUserIdAndTId
     *
     * @param int $user_id
     * @param int $ts_id
     * @return float
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月13日
     */
    public function getPriceByUserIdAndTId(int $user_id, int $ts_id): float
    {
        $user_id = (int)$user_id;
        $ts_id = (int)$ts_id;

        return 1*(TeamShopExtra::where(['user_id'=>$user_id, 'ts_id'=>$ts_id])->sum('price'));
    }
}