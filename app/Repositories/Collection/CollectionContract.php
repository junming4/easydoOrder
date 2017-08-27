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

}