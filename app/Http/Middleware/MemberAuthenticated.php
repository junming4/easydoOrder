<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

class MemberAuthenticated
{
    /**
     * The guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }

    /**
     * handle
     *
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return mixed
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月27日
     */
    public function handle($request, Closure $next, $guard = null)
    {
        return $this->auth->guard($guard)->basic() ?: $next($request);
    }
}
