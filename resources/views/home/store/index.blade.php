@extends('home.layouts.master')
@section('title', '饭拼-店铺首页')
@section('contents')
    <body>
    @include('home.partials.header')
    <div class="header_placeholder"></div>

    @include('home.partials.storeHeader')

    <div class="plstoreOrdermsg pl5ordercolor333">
        <div class="plstordermsgCen">
            <div class="pl5plstmsgCenter">
                <div class="plstoremsgcLeft">
                    <p class="plstormsglfont24">很抱歉，您所拼的单看来不成了，想看看其他拼成的单吗？</p>
                    <p>祝您用餐愉快，有更多能量为理想拼博！</p>
                </div>
                <div class="plstoremsgcRight">
                    <a href="javascript:void(0);" class="pl5stmsgClose"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="restaurantNavbar">
        <div class="restaunavbarCenter">
            <div class="restaubarcenleftauto">
                <div class="restubarcenLeft">
                    <ul>
                        @forelse  ($list as $key=>$item)
                        <li><a href="#go_{{ $item['cate']->stcate_id }}" @if($key ==0)  class="restbaleActive" @endif>{{ $item['cate']->stcate_name }}</a></li>
                        @empty
                        @endforelse
                            <li><a href="#go_5">餐厅简介</a></li>
                    </ul>
                </div>
                <div class="restubarcenRight">
                    <div class="pl3setuporder restriptop7"><a href="{{ route('member.cart.create') }}"><span>团队订餐</span></a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="plstoreRecommend clear">

        @forelse ($list as $item)
        <div class="plstorerecoListcont clear">
            <div class="plstorecoTitle">
                <h3 id="go_{{ $item['cate']->stcate_id }}">{{ $item['cate']->stcate_name }}</h3>
                <div class="plstoreRecomright">
                    <div class="plstorecoDrop">
                        <div class="plstorecobor">
                            <a href="javascript:void(0);">菜单</a>
                            <span></span>
                        </div>
                        <div class="plstoreDropdownnav">
                            <ul>
                                <li><a href="#">店长推荐</a></li>
                                <li><a href="#">海鲜盖饭</a></li>
                                <li><a href="#">开胃菜</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="plstorelistcontenthot clear">

                @forelse ($item['goodsList'] as $goods)
                <div class="plstlistbox">
                    <div class="plstlistboxpic">
                        <a href="javascript:void(0);"><img src="{{ $goods->goods_image }}" alt="" /></a>
                        <div class="plstboxpicopacity">
                            <a href="javascript:void(0);" data-id="{{ $goods->goods_id }}"
                               data-price="{{ $goods->goods_price }}" data-goods-name="{{ $goods->goods_name }}"></a>
                        </div>
                    </div>
                    <div class="plstlistboxnamedd">
                        <div class="plstnamddtop">
                            <span><a href="javascript:void(0);">{{ $goods->goods_name }}</a></span>
                            <strong><b>￥</b>{{ $goods->goods_price }}</strong>
                        </div>
                        <div class="plstnamddbom">
                            <strong>{{ $goods->attractive_title }}</strong>
                            <span>月售{{ $goods->sale_num }}份</span>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        @empty
        @endforelse

    </div>

    @include('home.partials.footer')
    @include('home.partials.addCartMsg');

    {{--隐藏整个数据--}}
    <input type="hidden" id="store_id" value="{{ $store->store_id }}">
    <input type="hidden" id="cartUrl" value="{{ route('member.shopping.create') }}">
    <input type="hidden" id="collectUrl" value="{{ route('member.collection.create') }}">

    <div class="backTop">
        <a href="javascript:void(0);"></a>
    </div>
    </body>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('home/js/component/addCart.js') }}"></script>
@endsection

