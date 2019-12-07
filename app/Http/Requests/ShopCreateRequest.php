<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * ShopCreateRequest
 *
 * @author 肖俊明<xiaojunming@eelly.net>
 * @since  2017
 * @version 1.0
 */
class ShopCreateRequest extends FormRequest
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
            'uuid' => 'required|unique:team_shops',
            'store_id' => 'required|integer',
            'team_time' => 'required|date',
            'price' => 'required'
        ];
    }

    /**
     * messages
     *
     * @return array
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月10日
     */
    public function messages()
    {
        return [
            'uuid.required' => '必须填写“uuid不能为空”。',
            'store_id.required' => '必须填写“店铺ID”。',
            'store_id.integer' => '必须填写“店铺ID”。',
            'team_time.required' => '必须填写“用餐时间”。',
            'team_time.date' => '必须填写“用餐时间格式有误”。',
            'price.required' => '必须填写“支出限额”。',
        ];
    }

    /**
     * 返回的值
     *
     * @return array
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月10日
     */
    public function fillData()
    {
        return [
            'user_id' => Auth::user()->user_id,
            'uuid' => $this->uuid,
            'store_id' => $this->store_id,
            'team_time' => strtotime($this->team_time),
            'price' => $this->price *1,
            'is_see' => $this->is_see ??  0,
            'team_ids' => '',
            'status' => 0
        ];
    }


}
