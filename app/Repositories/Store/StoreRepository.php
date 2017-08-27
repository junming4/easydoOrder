<?php
/**
 * PHP version 7.0+
 *
 * @copyright  Copyright (c) 2012-2015 EELLY Inc. (http://www.eelly.com)
 * @link       http://www.eelly.com
 * @license    衣联网版权所有
 */


namespace App\Repositories\Store;



use App\Models\Store;

class StoreRepository implements StoreContract
{


    public function create(array $input): bool
    {
        $user = Store::create($input);
        if ($user->save()) {
            return true;
        }
        return false;
    }

    public function storeInfo(int $store_id):Store
    {
        return Store::find($store_id);
    }
}