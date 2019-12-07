<?php
/**
 * PHP version 7.0+
 *
 * @copyright  Copyright (c) 2012-2015 EELLY Inc. (http://www.eelly.com)
 * @link       http://www.eelly.com
 * @license    衣联网版权所有
 */


namespace App\Repositories\Collection;


use App\Models\Collection;

class CollectionRepository implements CollectionContract
{


    /**
     * 创建数据
     *
     * @param array $input
     * @return bool
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年06月18日
     */
    public function create(array $input): bool
    {
        $user = Collection::create($input);
        if ($user->save()) {
            return true;
        }
        return false;
    }

    public function list(): array
    {
        // TODO: Implement list() method.
    }

    /**
     * find
     *
     * @param int $col_id
     * @return mixed|static
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年09月01日
     */
    public function find(int $col_id)
    {
        return Collection::find($col_id);
    }

    /**
     * getInfo
     *
     * @param int $stg_id
     * @param int $type
     * @param array $where
     * @return mixed|static
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年09月01日
     */
    public function getInfo(int $stg_id, int $type = 0, array $where = [])
    {
        if ($stg_id > 0) {
            $where['stg_id'] = $stg_id;
        }
        if ($type >= 0) {
            $where['type'] = $type;
        }
        return Collection::where($where)->get();
    }
}