@extends('member.layouts.master')
<body>
    @section('contents')
        @include('member.partials.header')
        <div class="header_placeholder"></div>

        <div class="ucenter-top"></div>

        <div class="ucenter-wrap clear">
            @include('member.partials.left')
            <div class="mybalanceContainer clear">
                <div class="grouporderWrap">
                    <div class="gdDinnertime">
                        <strong>用餐时间：今天，12:30am</strong>
                        <span><a href="javascript:void(0)" class="gd-dinner-time-editor">更改</a></span>
                    </div>
                    <div class="expenRestriction">
                        <div class="expenresttop">
                            <p class="ertcolorblack">支出限额（可选）</p>
                            <p>此限制仅适用于共享购物车的客人。 </p>
                        </div>
                        <div class="expenresboxlist">
                            <ul>
                                <li class="expbliotherCur"><a href="#" class="epblbrrfire">没有限制</a></li>
                                <li><a href="#">￥15</a></li>
                                <li><a href="#">￥20</a></li>
                                <li><a href="#">￥30</a></li>
                                <li class="expbliborr">
                                    <a href="#" class="epblbrrlast">其他</a>
                                    <div class="expbformbox">
                                        <form>
                                            <input type="text" placeholder="￥35" class="expbformbtext" name="price" value="0"/>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="gprdimember">
                        <div class="gprdidd">
                            <span class="check-status checkboxCur"></span>
                            <input type="hidden" name="" value="0" />
                            <strong>允许团队其他成员可以查看整个购物车</strong>
                        </div>
                    </div>
                    <div class="gprdishareCont">
                        <div class="gprdisharectop">将此链接并分享给其他成员，以将产品添加到团体购物车</div>
                        <div class="gprdisharecbom">
                            <input type="text" value="https://www.trycaviar.com/carts/cart-9qMs4N" class="gprbomsharetext copy-values" />
                            <div class="gprbomshareBtn">
                                <a href="javascript:;" class="copy-link">复制</a>
                            </div>
                        </div>
                    </div>
                    <div class="guporingbar">
                        <div class="guingbarright">
                            <a href="javascript:;" class="group-order-remove">删除</a>
                            <a href="#" class="guingcreabtn">创建</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('member.partials.footer')
        {{--隐藏部分--}}
        <div class="modifyTime">
            <div class="modifyTimeTcitle">
                <strong>更改用餐时间</strong>
                <span class="modify-time-close"></span>
            </div>
            <div class="modifyTeformCont">
                <div class="contmonthycformbsele modifytewid285">
                    <div class="contmoncfSelecttit modifytseTitl">
                        <a href="javascript:void(0);">星期一 8/23</a>
                        <input type="hidden" name="team_date" value="" />
                        <span></span>
                    </div>
                    <div class="contmoncfSelectNav modifytselenav clear">
                        <ul>
                            @foreach($dateList as $key=>$date)
                            <li><a href="javascript:void(0);" data-value="{{ $key }}">{{$date}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="contmonthycformbsele modifytewid285">
                    <div class="contmoncfSelecttit modifytseTitl">
                        <a href="javascript:void(0);">12:00 午餐</a>
                        <input type="hidden" name="team_time" value="" />
                        <span></span>
                    </div>
                    <div class="contmoncfSelectNav modifytselenav clear">
                        <ul>
                            <li><a href="javascript:void(0);" data-value="9">09:00 早餐</a></li>
                            <li><a href="javascript:void(0);" data-value="12">12:00 午餐</a></li>
                            <li><a href="javascript:void(0);" data-value="18">18:00 晚餐</a></li>
                        </ul>
                    </div>
                </div>
                <div class="modifytebutton"><a href="#">确定修改</a></div>
            </div>
        </div>
        {{--end隐藏部分--}}
        <div class="backTop"><a href="javascript:void(0);"></a></div>
    @endsection
</body>
