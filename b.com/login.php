<?php
/**
 * Created by PhpStorm.
 * User: steveyin
 * Date: 2018/4/5
 * Time: 下午3:07
 */

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username && $password) {
    $url = "http://www.sso.com/sso/login?username=".$username."&password=".$password."&url=http://www.b.com";
    //调用sso中心接口验证用户名密码
    header("Location:".$url);
} else {
    echo "请输入用户名和密码";
    exit;
}

exit;