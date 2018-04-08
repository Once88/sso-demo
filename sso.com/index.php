<?php
/**
 * Created by PhpStorm.
 * User: steveyin
 * Date: 2018/4/5
 * Time: 下午3:27
 */
//print_r($_SERVER);exit;

//定义开始时间
define("APP_START", microtime(true));

//定义根目录
define("BASEPATH", __DIR__ . '/');

//获得请求地址
$root = $_SERVER['SCRIPT_NAME'];
$request = $_SERVER['REQUEST_URI'];

//获取index.php 后面的地址
$full = trim(str_replace($root, '', $request), '/');
$url = substr($full, 0, stripos($full, '?'));

//解析QUERY_STRING，生成$_GET
$_SERVER['QUERY_STRING'] = substr($full, stripos($full, '?')+1);
parse_str($_SERVER['QUERY_STRING'], $_GET);

//如果为空则访问默认控制器的默认方法
if (empty($url)) {
    //默认控制器和默认方法
    $class = 'index';
    $func = 'index';
} else {
    $uri = explode('/', $url);
    $class = $uri[0];

    //如果function为空，则访问默认方法
    if (count($uri) < 2) {
        $func = 'index';
    } else {
        $func = $uri[1];
    }
}

$class .= 'controller';

//把控制器类加载进来
include(BASEPATH . 'Controllers/' . $class . '.php');

//class首字母大写
$class = ucfirst($class);
$obj = new $class;


//反射调用class中的function
call_user_func_array(
//调用function
    array($obj, $func),
    //传递参数
    array_slice($uri, 2)
);


