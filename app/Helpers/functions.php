<?php
/**
 * PHP version 7.1+
 *
 * @copyright  Copyright (c) 2012-2015 EELLY Inc. (http://www.eelly.com)
 * @link       http://www.eelly.com
 * @license    衣联网版权所有
 */

if (!function_exists('isMobile')) {
    /**
     * 判断是否是手机号码
     * @param $mobile
     * @return bool
     * @auth xiaojunming<xiaojunming@eelly.net>
     * @since 2017/06/10 22:45:56
     */
    function isMobile($mobile): bool
    {
        $mobile = trim($mobile);
        if (strlen($mobile) < 1) {
            return false;
        }
        $pattern = "/^1[34578]\d{9}$/";
        if (preg_match($pattern, $mobile)) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('isEmail')) {

    /**
     * 是否是邮件
     *
     * @param $email
     * @return bool
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月10日
     */
    function isEmail($email): bool
    {
        $email = trim($email);
        if (strlen($email) < 1) {
            return false;
        }
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if (preg_match($pattern, $email)) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('getDateForShop')) {
    /**
     * 获取格式化过的时间
     *
     * @param int $startTime 开始日期
     * @param int $dayNum 获取天数
     * @return array
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月27日
     */
    function getDateForShop(int $startTime = 0, int $dayNum = 7)
    {
        $startTime = (int)$startTime;
        $dateList = [];
        if ($startTime < 1) {
            $startTime = time();
        }
        $startTime = strtotime(date('Y-m-d', $startTime));
        if (date('Y-m-d', $startTime) == date('Y-m-d')) {
            $dateList[$startTime] = '今天';
            $dateList[$startTime + 24 * 3600] = '明天';
            $dayNum = $dayNum - 2;
            $startTime = $startTime + 2 * 24 * 3600;
        }
        for ($i = 1; $i <= $dayNum; $i++) {
            $dateList[$startTime] = \Jenssegers\Date\Date::parse($startTime)->format('l m/d');;
            $startTime = $startTime + 24 * 3600;
        }
        return $dateList;
    }
}
