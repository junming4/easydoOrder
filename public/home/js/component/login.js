/**
 * 登录js.
 */

function login()
{
    var userNameNode = $("#userName");
    var password = $("#password");

    if(!userNameNode.val()){
        alert("账号不能为空!");
        return false;
    }
    if(!password.val()){
        alert("密码不能为空!");
        return false;
    }
    $('#login').submit();
}
