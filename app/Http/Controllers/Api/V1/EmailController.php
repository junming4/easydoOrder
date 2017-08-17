<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiV2Controller;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * EmailController
 *
 * @author 肖俊明<xiaojunming@eelly.net>
 * @since  2017年08月17日
 * @version 1.0
 */
class EmailController extends ApiV2Controller
{
    
    /**
     * 发送验证码
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月17日
     */
    public function sendCheckCode(Request $request)
    {
        $email = $request->get('email', '');
        $type = $request->get('type', '');
        if (strlen($email) < 1) {
            return $this->setStatusCode(400)->responseError('参数非法!');
        }
        Mail::to($email)->send(new SendEmail($email,$type));
        return $this->setStatusCode(200)->responseSuccess([]);
    }
}
