<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * ShopExtraCreateRequest
 *
 * @author 肖俊明<xiaojunming@eelly.net>
 * @since  2017年08月13日
 * @version 1.0
 */
class ShopExtraCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'ts_id' => 'required|integer',
            'store_id' => 'required|integer',
            'goods_id' => 'required|integer',
            'goods_num' => 'required|integer'
        ];
    }

    /**
     * messages
     *
     * @return array
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月13日
     */
    public function messages()
    {
        return [
            'ts_id.required' => '必须填写“ts_id不能为空”。',
            'store_id.integer' => '必须填写“店铺ID”。',
            'goods_id.integer' => '必须填写“商品ID”。',
            'goods_num.integer' => '必须填写“商品数量”。'
        ];
    }

    /**
     * fillData
     *
     * @return array
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月13日
     */
    public function fillData()
    {
        return [
            'user_id' => 1,
            'ts_id' => $this->ts_id,
            'store_id' => $this->store_id,
            'goods_id' => $this->goods_id,
            'goods_num' => $this->goods_num,
            'price' => 20
        ];
    }

}
