<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiV2Controller extends ApiController
{

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($message)
    {
        return $this->responseJson([
            'code' => $this->getStatusCode(),
            'msg' => $message
        ]);
    }

    /**
     * @param $result
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseSuccess($result)
    {

        $result['code'] = $this->getStatusCode() ? 200 : $this->getStatusCode(); //默认赋值给code

        if (!isset($result['msg']) || strlen($result['msg']) < 1) $result['msg'] = 'Success';


        return $this->responseJson($result);
    }

    /**
     * 对返回数据进行处理
     * @param array $result
     */
    protected function responseJson(array $result)
    {
        return response()->json($result, 200, $this->getHeaders());
    }

}
