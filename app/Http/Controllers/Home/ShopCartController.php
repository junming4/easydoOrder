<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ShopCreateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCartController extends Controller
{
    //
    public function create(ShopCreateRequest $request)
    {
        $row = ShoppingCart::add($request);
        dd($row);
    }
}
