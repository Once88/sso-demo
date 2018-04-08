<?php
/**
 * Created by PhpStorm.
 * User: steveyin
 * Date: 2018/4/8
 * Time: 上午9:52
 */

class SsoController
{

    /**
     * 判断是否已登录
     */
    public function auth()
    {
        $cookie = $_COOKIE['sso_cookie'] ?? '';
        var_dump($cookie);

        //判断是否有cookie，有则返回token；没有则跳转登录页
        if ($cookie == 'sso') {
            $callback_url = $_GET['callback_url'];
            header('Location:' . $callback_url . '?token=ssotoken');
        } else {
            $login_url = $_GET['login_url'];
            header('Location:' . $login_url);
        }

        exit;
    }

    /**
     * 验证token是否有效
     */
    public function auth_token()
    {
        $token = $_GET['token'] ?? '';

        if ($token == 'ssotoken') {
            echo 'success';
        } else {
            echo 'fail';
        }

        exit;
    }

    /**
     * 登录
     */
    public function login()
    {
        $username = $_GET['username'] ?? '';
        $password = $_GET['password'] ?? '';
        $url = $_GET['url'] ?? '';
        if ($username == 'a' && $password == '1') {
            //用户名密码正确，则创建全局会话，并返回token
            setcookie('sso_cookie', 'sso', time() + 600, '/');
            //跳转并附上token
            header("Location:" . $url . "?token=ssotoken");
        } else {
            //跳转
            header("Location:" . $url);
        }

        exit;
    }
}