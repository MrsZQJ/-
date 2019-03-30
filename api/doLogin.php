<?php
header('Access-Control-Allow-Origin:http://client.runoob.com');
error_reporting(E_ALL ^ E_NOTICE);
$username = $_POST['username'];
$password = $_POST['password'];
require_once "tools/doSql.php"; 
$sql = "select *from users where name='$username' and password = '$password' ";
$data=my_select($sql);
// echo json_encode($data);
if(count($data) > 0){
    //要把一些东西存在session里（因为相当于存在了保险柜里，保险柜里有东西就证明登录了，没东西就证明没登录或者登录失败）
    session_start();
    // 因为哪怕只查到一条数据，它也是一个二维数组，而我们要的就只是那条数据保存起来，所以取下标0
    $_SESSION['userInfo'] = $data[0];

    //查到结果，就代表登录成功
    echo '{ "msg":"success","code":0 }';
}else{

    echo '{ "msg":"fail","code":1 }';
}