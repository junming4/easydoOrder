<?php
/**
 * PHP version 7.0+
 *
 * @copyright  Copyright (c) 2012-2015 EELLY Inc. (http://www.eelly.com)
 * @link       http://www.eelly.com
 * @license    衣联网版权所有
 */


namespace App\Repositories\Goods;


use App\Models\Goods;

/**
 * GoodsRepository
 *
 * @author 肖俊明<xiaojunming@eelly.net>
 * @since  2017
 * @version 1.0
 */
class GoodsRepository implements GoodsContract
{


    /**
     * create
     *
     * @param array $input
     * @return bool
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017
     */
    public function create(array $input): bool
    {
        $user = Goods::create($input);
        if ($user->save()) {
            return true;
        }
        return false;
    }

    /**
     * getList
     *
     * @param int $store_id
     * @param int $stcate_id
     * @param int $goods_state
     * @param array $where
     * @param bool $bCount
     * @param string $order_by
     * @param string $sort
     * @param string $limits
     * @param array $fields 查询字段
     * @return \Illuminate\Support\Collection|int
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月25日
     */
    public function getList($store_id, $stcate_id = 0, $goods_state = -1, $where = array(), $bCount = false,
                            $order_by = 'goods_id', $sort = 'DESC', $limits = '0,20', $fields = ['*'])
    {
        $store_id = (int)$store_id;
        $stcate_id = (int)$stcate_id;
        $goods_state = (int)$goods_state;

        if ($store_id > 0) {
            $where['store_id'] = $store_id;
        }
        if ($goods_state >= 0) {
            $where['goods_state'] = $goods_state;
        }

        if ($bCount == true) {
            return Goods::where($where)->whereRaw('FIND_IN_SET(' . $stcate_id . ',stcate_ids)')->count();
        }
        $pages = config('pages');

        $offset = $pages['offset'];
        $limit = $pages['limit'];
        //分析limit
        if (preg_match("/^\d+,\d+$/i", $limits)) {
            list($offset, $limit) = explode(',', $limits);
        }
        return Goods::select($fields)->where($where)->whereRaw('FIND_IN_SET(' . $stcate_id . ',stcate_ids)')->orderBy($order_by, $sort)->offset($offset)->limit($limit)->get();
    }


}