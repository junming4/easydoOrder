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

class UserRepository implements CollectionContract
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

}