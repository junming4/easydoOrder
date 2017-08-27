@extends('home.layouts.master')
@section('title', '饭拼-注册页')
@section('header')
    @include('home.partials.header')
@endsection

@section('contents')
    <div class="editdataWrap regediwrappadt0 clear">
        <div class="nregistercontcenter clear">
            <div class="clReceptionlogin clear">
                <div class="clrelogintitle">创建账户</div>
                @include('home.auth.errors.errors')
                {!! Form::open(['url' => ['register'], 'id' => 'register','class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
                <div class="clreloginContentform clear">
                    <input type="text" placeholder="账号" class="clrelcformText" name="user_name" />
                    <input type="text" placeholder="邮箱地址" class="clrelcformText" name="email" id="email"/>
                    <div class="clcphoneCwyg clccwygwidth401">
                        <input type="text" placeholder="验证码" class="contlogconText contlotxtwidth254" name="code" id="codeForEmail" />
                        <a href="javascript:void(0);" onclick="sendEmail()" data-url="{{ url('api/email/send/code') }}" id="sendEmail" class="colObtainver collbtwidth137">获取验证码</a>
                    </div>
                    <input type="hidden"  name="type" value="register"/>
                    <input type="password" placeholder="密码" class="clrelcformText" name="password" id="password"/>
                    <input type="password" placeholder="重复密码" class="clrelcformText" name="password_confirmation" id="rePassword"/>
                    <a href="javascript:void(0);" onclick="register()" class="clrelcformlogBtn">创建账户</a>
                    <div class="clrelcForgotmsg clcregformsg">如果继续，表示您同意饭拼<a href="#">条件和条款</a></div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('home.partials.footer')
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('home/js/component/public.js') }}"></script>
@endsection


