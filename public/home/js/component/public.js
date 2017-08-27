/**
 * 公用的js.
 */

function isEmail(str) {
    var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
    return reg.test(str);
}

var wait = 60;
function time(o) {
    if (wait === 0) {
        o.attr('onclick', 'sendSms()');
        o.html("发送验证码");
        wait = 60;
    } else {
        o.attr('onclick', '');
        o.html("重新发送(<em style='color:#ff8533'>" + wait + "s</em>)");
        wait--;
        setTimeout(function () {
                time(o)
            },
            1000)
    }
}

var sendCodeNode = $("#sendEmail");
var emailNode = $("#email");
var passwordObj = $("#password");
var rePasswordObj = $("#rePassword");

//发送短信
function sendEmail()
{

    var url = sendCodeNode.attr('data-url');

    if (!isEmail(emailNode.val())) {
        alert("请输入正确的邮箱");
        emailNode.focus();
        return false;
    }
    if (sendCodeNode.text() === "邮件发送中...") {
        sendCodeNode.text('短信发送中...');
        return false;
    }

    if ((sendCodeNode.text() != "获取验证码") && (sendCodeNode.html() != "短信发送中...")) {
        alert('短信已发送');
        return false;
    }
    $.ajax({
        type: 'get',
        url: url,
        data: {'email': emailNode.val(), 'type': 'register'},
        dataType: 'json',
        success: function (msg) {
            if (msg.code == 200) {
                alert("发送成功,请注意查收");
                time(sendCodeNode);
            } else {
                sendCodeNode.html('发送验证码');
                if(msg.error.code == 409) {
                    showUrl();
                    return false;
                }
                var text = msg.error.msg;
                layer.tips(text, codeObj, {tips: 3});
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('未知错误，请重试！');
        }
    });
}


function register()
{
    if (!isEmail(emailNode.val())) {
        alert('请输入正确的邮箱');
        emailNode.focus();
        return false;
    }
    var codeForEmailNode = $("#codeForEmail");
    if (codeForEmailNode.val() === '') {
        alert('验证码不能为空');
        codeForEmailNode.focus();
        return false;
    }
    var password = passwordObj.val();
    if (!password ||  password.length<6 ||  password.length> 20){
        alert('密码不符合规则，请重新输入');
        passwordObj.focus();
        return false;
    }
    var re_password = rePasswordObj.val();

    if (!re_password || re_password != password) {
        alert('两次输入不一致，请重新输入');
        rePasswordObj.focus();
        return false;
    }

    $('#register').submit();

}

