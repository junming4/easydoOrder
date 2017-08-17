<?php


namespace App\Repositories\SendEmail;


use Illuminate\Support\Facades\Cache;

/**
 * SendEmailRepository
 *
 * @author 肖俊明<xiaojunming@eelly.net>
 * @since  2017
 * @version 1.0
 */
class SendEmailRepository implements SendEmailContract
{
    /**
     * emailKey
     *
     * @var null
     */
    private $emailKey = null;

    /**
     * setKey
     *
     * @param string $email
     * @param string $type
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月16日
     */
    public function setKey(string $email, string $type): void
    {
        $this->emailKey = $email .'_'. $type;
    }

    /**
     * getKey
     *
     * @return string
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月16日
     */
    public function getKey(): string
    {
        return $this->emailKey;
    }

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
    public function setCode(string $email, string $type, int $code): bool
    {
        $this->setKey($email,$type);
        $codeExpireTime = config('common.email.codeExpireTime');
        Cache::put($this->getKey(),$code, $codeExpireTime);
        return true;
    }

    /**
     * 校验验证码
     *
     * @param string $email 邮箱
     * @param string $type 类型
     * @param int $code 验证码
     * @return int 返回验证 1表示校验正确，-1 验证码过期或者不存在, -2 验证码不正确
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月16日
     */
    public function checkCode(string $email, string $type, int $code): int
    {
        $this->setKey($email, $type);
        $key = $this->getKey();
        if (!Cache::get($key)) {
            return -1; //验证码不存在
        }
        $tmpCode = Cache::get($key);
        if ($tmpCode != $code) {
            return -2; //验证码不正确
        }
        Cache::forget($key); //返回true并且删除数据
        return 1;
    }
}