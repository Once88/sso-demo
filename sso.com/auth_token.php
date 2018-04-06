<?php
/**
 * Created by PhpStorm.
 * User: steveyin
 * Date: 2018/4/5
 * Time: 下午5:01
 */

$token = $_GET['token'] ?? '';

if($token == 'ssotoken') {
    echo 'success';
} else {
    echo 'fail';
}
exit;