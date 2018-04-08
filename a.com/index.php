<?php
/**
 * Created by PhpStorm.
 * User: steveyin
 * Date: 2018/4/5
 * Time: 下午2:49
 */


//如果有token参数，则验证token
$token = $_GET['token'] ?? '';

if ($token) {
    $result = file_get_contents('http://www.sso.com/sso/auth_token?token=' . $token);

    //token验证成功，返回请求页面，否则跳转至登录页面
    if ($result == 'success') {
        //创建局部会话
        setcookie('sso_cookie', 'sso', time() + 600);
        include("main_view.php");
    } else {
        include("login_view.php");
    }
} else {
    //没有token参数，获取本地cookie
    $sso_cookie = $_COOKIE['sso_cookie'] ?? '';

    if ($sso_cookie == 'sso') {
        include("main_view.php");
    } else {
        //重定向到sso授权中心
        $callback_url = "http://www.a.com";
        $login_url = "http://www.a.com/login_view.php";
        header('Location:http://www.sso.com/sso/auth?callback_url=' . $callback_url . '&login_url=' . $login_url);
    }
}

exit;
