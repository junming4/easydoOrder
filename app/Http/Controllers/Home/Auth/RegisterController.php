<?php

namespace App\Http\Controllers\Home\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\SendEmail\SendEmailContract;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $sendEmailContract;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SendEmailContract $sendEmailContract)
    {
        $this->middleware('guest');
        $this->sendEmailContract = $sendEmailContract;
    }

    /**
     * 注册展示页
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @auth 肖俊明<xiaojunming@eelly.net>
     * @since 2017年08月21日
     *
     */
    public function showRegistrationForm()
    {
        return view('home.auth.register');
    }


    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $email = $request->get('email','');
        $type = $request->get('type', '');
        $code = $request->get('code', 0);

        if(!isEmail($email)) return Redirect::back()->withInput()->withErrors('邮箱不正确！');

        if (($status = (int)$this->sendEmailContract->checkCode($email,$type, $code)) <= 0) {
            if ($status === -1) {
                return Redirect::back()->withInput()->withErrors('您的验证码不存在，请重新输入');
            } elseif ($status === -2) {
                return Redirect::back()->withInput()->withErrors('您的验证码不正确，请重新输入');
            } elseif ($status === -3) {
                return Redirect::back()->withInput()->withErrors('您的验证码已经验证过了，请重新再发验证码!');
            } else {
                return Redirect::back()->withInput()->withErrors('您的验证码可以已经过期了，请重新再发验证码!');
            }
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'user_name' => $data['user_name'],
            'nick_name' => substr($data['email'], 0,10),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'mobile' => '',
            'location_id' => 1 //默认广州好点
        ]);
    }
}
