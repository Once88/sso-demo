<?php
/**
 * Created by PhpStorm.
 * User: steveyin
 * Date: 2018/4/8
 * Time: 上午9:52
 */

class IndexController
{
    /**
     * 默认func
     */
    public function index()
    {
        echo "hello, steve.";
        var_dump($_COOKIE);
        exit;
    }

}