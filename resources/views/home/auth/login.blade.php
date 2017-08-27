@extends('home.layouts.master')
@section('title', '饭拼-登录页')
@section('header')
    @include('home.partials.header')
@endsection

@section('contents')
    <div class="editdataWrap regediwrappadt0 clear">
        <div class="nregistercontcenter clear">
            <div class="clReceptionlogin">
                <div class="clrelogintitle">登录帐户</div>
                @include('home.auth.errors.errors')
                {!! Form::open(['url' => ['login'], 'id' => 'login','class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
                <div class="clreloginContentform">
                    <input type="text" placeholder="账号/邮箱" class="clrelcformText" name="email" id="userName" />
                    <input type="password" placeholder="密码" class="clrelcformText" name="password" id="password"/>
                    <a href="javascript:void(0);" onclick="login()" class="clrelcformlogBtn">登录</a>
                    <div class="clrelcForgotmsg"><a href="#">忘记密码</a></div>
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
    <script type="text/javascript" src="{{ asset('home/js/component/login.js') }}"></script>
@endsection
