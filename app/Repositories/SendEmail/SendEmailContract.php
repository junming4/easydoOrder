<?php

namespace App\Repositories\SendEmail;


/**
 * 描述一下
 *
 * @author  肖俊明<xiaojunming@eelly.net>
 * @since 2017年08月16日
 */
interface SendEmailContract
{
    /**
     * setCode
     *
     * @param string $email
     * @param string $type
     * @param int $code
     * @return bool
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月16日
     */
    public function setCode(string $email, string $type, int $code): bool;

    /**
     * checkCode
     *
     * @param string $email
     * @param string $type
     * @param int $code
     * @return int
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月16日
     */
    public function checkCode(string $email, string $type, int $code): int;
}