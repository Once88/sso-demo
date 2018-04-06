<?php
/**
 * Created by PhpStorm.
 * User: steveyin
 * Date: 2018/4/6
 * Time: 下午2:59
 */

//var_dump($_GET);
//var_dump($_POST);
//exit;

$username = $_GET['username']??'';
$password = $_GET['password']??'';
$url = $_GET['url']??'';
if($username == 'a' && $password == '1') {
    //用户名密码正确，则创建全局会话，并返回token
    setcookie('sso_cookie', 'sso', time()+600);
    //跳转并附上token
    header("Location:".$url."?token=ssotoken");
    exit;
//    echo 'ssotoken';
}else {
    echo 'false';
}

exit;