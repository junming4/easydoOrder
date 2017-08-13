<?php

namespace App\Repositories\ShopCart;


interface ShopCartContract
{
    public function create(array $input): bool;
}