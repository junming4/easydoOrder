/**
 * 添加数据到购物车效果.
 */

var cartUrl = $("#cartUrl").val();
var storeId = $("#store_id").val();

$(function () {

    //添加数到购物车中
    $(".plstorelistcontenthot").find('.plstlistbox .plstlistboxpic .plstboxpicopacity').click(function () {
        var goods_id = $(this).find('a').attr('data-id');
        var price = $(this).find('a').attr('data-price');
        var goods_name = $(this).find('a').attr('data-goods-name');

        $.ajax({
            type: 'get',
            url: cartUrl,
            data: {'goods_id': goods_id,'price': price,
                'goods_num': 1, 'store_id': storeId, 'goods_name': goods_name},
            dataType: 'json',
            success: function (msg) {
                if (msg.code == 200) {
                    layer.tips('发送成功,请注意查收', codeObj, {tips: 3});
                    time(sendCodeNode);
                } else {
                    sendCodeNode.html('发送验证码');
                    var text = msg.error.msg;
                    layer.tips(text, codeObj, {tips: 3});
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('未知错误，请重试！');
            }
        });

    });
    //添加收藏
    $(".plstlovetag span").click(function () {
        var collectUrl = $("#collectUrl").val();
        $.ajax({
            type: 'get',
            url: collectUrl,
            data: {'stg_id': storeId},
            dataType: 'json',
            success: function (msg) {
                console.log(msg);
                /*if (msg.code == 200) {
                    layer.tips('发送成功,请注意查收', codeObj, {tips: 3});
                    time(sendCodeNode);
                } else {
                    sendCodeNode.html('发送验证码');
                    var text = msg.error.msg;
                    layer.tips(text, codeObj, {tips: 3});
                }*/
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('未知错误，请重试！');
            }
        });

    });

});