<?php
/**
 * 认证是否登录
 * User: steveyin
 * Date: 2018/4/5
 * Time: 下午3:26
 */


$cookie = $_COOKIE['sso_cookie'] ?? '';

//判断是否有cookie，有则返回token；没有则跳转登录页
if($cookie == 'sso') {
//    echo "success";
    $callback_url = $_GET['callback_url'];
    header('Location:'.$callback_url.'?token=ssotoken');
}else {
    $login_url = $_GET['login_url'];
    header('Location:'.$login_url);
}

//var_dump($_COOKIE);
exit;