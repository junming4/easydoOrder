<?php

/*
 * 接口控制器
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    /**
     * @var
     */
    protected $status_code;

    protected $headers = [];

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }


    /**
     * @param mixed $status_code
     */
    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;

        return $this;
    }

    /**
     * 找不到数据返回错误
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(404)->responseError($message);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($message)
    {
        return $this->responseJson([
            'status' => 'failed',
            'error' => [
                'code' => $this->getStatusCode(),
                'msg' => $message
            ]
        ]);
    }

    /**
     * 缺少参数返回错误
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseMisParameter($message = 'You Missing parameter')
    {
        return $this->setStatusCode(400)->responseError($message);
    }


    /**
     * 服务器错误
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseServerError($message = 'Server Busy', $code = 500)
    {
        return $this->setStatusCode($code)->responseError($message);
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
