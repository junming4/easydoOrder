<?php


namespace App\Repositories\TeamShop;

use App\Models\TeamShop;

class TeamShopRepository implements TeamShopContract
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
        $teamShop = TeamShop::create($input);
        if ($teamShop->save()) {
            return true;
        }
        return false;
    }

    /**
     * 获取基础数据
     *
     * @param int $ts_id
     * @return TeamShop|null
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月10日
     */
    public function find(int $ts_id)
    {
        return TeamShop::find($ts_id);
    }
}