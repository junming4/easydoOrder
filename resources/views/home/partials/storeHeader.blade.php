<div class="plstorePerso">
    <div class="plstorePersoCen">
        <div class="plstorepcenLeft">
            <div class="plstoreleflogo">
                <img src="{{ $store->store_logo }}" alt="" />
                <div class="plstoflogpopdrop">
                    <ul>
                        <li class="plflogdropicon1">{{ str_limit($store->address,20) }}</li>
                        <li class="plflogdropicon2">早上{{$store->start_time}}--晚上{{$store->start_time}}</li>
                        <li class="plflogdropicon3">{{ $store->store_phone }}&nbsp;&nbsp;&nbsp;黄先生</li>
                    </ul>
                </div>
            </div>
            <div class="plstorelefkey plfkeypt0">
                <div class="plstorelename">{{ $store->store_name }}</div>
                <div class="plstoreletime">
                    <p><strong>订餐时间</strong>：</p>
                    <p><strong class="strocoloryellow">早餐</strong> - 隔夜<strong class="strocoloryellow">15:30</strong>前，<strong class="strocoloryellow">午餐</strong> - <strong>10：30</strong>前，<strong class="strocoloryellow">晚餐</strong> - <strong>15:30</strong>前</p>
                </div>
                <div class="plstoreleRemainder">还差<strong>5</strong>人完成拼单</div>
            </div>
        </div>
        <div class="plstorepcenRight">
            <div class="plstoreDynamic">
                <div class="plstdytit">看看大家怎么说</div>
                <div class="plstoredycont">
                    <div class="plstodybox">
                        <div class="plstdybtop">
                            <strong>90</strong>
                            <span>%</span>
                        </div>
                        <div class="plstdybbom">味道好</div>
                    </div>
                    <div class="plstodybox">
                        <div class="plstdybtop">
                            <strong>95</strong>
                            <span>%</span>
                        </div>
                        <div class="plstdybbom">配送及时</div>
                    </div>
                    <div class="plstodybox">
                        <div class="plstdybtop">
                            <strong>98</strong>
                            <span>%</span>
                        </div>
                        <div class="plstdybbom">订单准确</div>
                    </div>
                </div>
            </div>
            <div class="plstorelove">
                <div class="plstlovetag">
                    <span></span>
                    <strong>45</strong>
                </div>
            </div>
        </div>
    </div>
</div>
