<?php

namespace App\Repositories\Goods;


/**
 * 描述一
 *
 * @author  xiaojunming<xiaojunming@eelly.net>
 * @since 2017年08月09日
 */
interface GoodsContract
{

    public function create(array $input): bool;

    public function getList($store_id, $stcate_id = 0, $goods_state = -1, $where = array(), $bCount = false,
                            $order_by = 'goods_id', $sort = 'DESC', $limits = '0,20', $fields = ['*']);
}