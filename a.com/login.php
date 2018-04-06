<?php
/**
 * Created by PhpStorm.
 * User: steveyin
 * Date: 2018/4/5
 * Time: 下午3:07
 */

$url = "http://www.a.com";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username && $password) {
    $url = "http://www.sso.com/login.php?username=".$username."&password=".$password."&url=http://www.a.com";
    //调用sso中心接口验证用户名密码
    header("Location:".$url);
    exit;
//    $result = file_get_contents("http://www.sso.com/login.php?username=" . $username . "&password=" . $password);
    //如果返回不为false，则返回的是token
    if($result != 'false') {
        $token = $result;
        //验证token
    }else{
        echo "用户名或密码错误";
        exit;
    }


//    setcookie('sso_cookie', 'sso', time() + 300);
//    header("Location:http://www.sso.com/auth.php?url=" . $url);


} else {
    echo "请输入用户名和密码";
    exit;
}

exit;