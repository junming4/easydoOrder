<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * CollectionCreateRequest
 *
 * @author 肖俊明<xiaojunming@eelly.net>
 * @since  2017
 * @version 1.0
 */
class CollectionCreateRequest extends FormRequest
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
            'stg_id' => 'required|integer',
        ];
    }

    /**
     * messages
     *
     * @return array
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年09月01日
     */
    public function messages()
    {
        return [
            'stg_id.required' => '必须填写“商品ID或者店铺ID”。',
            'stg_id.integer' => '必须填写“商品ID或者店铺ID”。'
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
            'stg_id' => $this->stg_id,
            'type' => isset($this->type) ? $this->type : 0,
            'user_id' => Auth::user()->user_id
        ];
    }
}
