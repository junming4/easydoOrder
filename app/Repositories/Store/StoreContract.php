<?php

namespace App\Repositories\Store;
use App\Models\Store;


/**
 * 描述一下
 *
 * @author  xiaojunming<xiaojunming@eelly.net>
 * @since 2017年08月09日
 */
interface StoreContract
{

    /**
     * 创建店铺
     *
     * @param array $input
     * @return bool
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月24日
     */
    public function create(array $input): bool;

    /**
     * 获取店铺信息
     *
     * @param int $store_id
     * @return Store
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月24日
     */
    public function storeInfo(int $store_id): Store;

}