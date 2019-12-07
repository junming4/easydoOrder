<?php

namespace App\Repositories\Collection;


/**
 * 描述一下
 *
 * @author  xiaojunming<xiaojunming@eelly.net>
 * @since 2017年08月09日
 */
interface CollectionContract
{

    public function create(array $input): bool;

    public function list(): array ;

    public function find(int $col_id);

    public function getInfo(int $stg_id, int $type = 0, array $where = []);

}