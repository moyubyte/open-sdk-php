<?php
/**
 * 有赞推送服务消息接收示例 https://www.youzanyun.com/docs/guide/push/692
 */

$client_id = "";
$client_secret = "";

$json = file_get_contents('php://input'); //接收推送数据
$data = json_decode($json, true);

/**
 * 判断消息是否合法，若合法则返回成功标识
 */
$msg = $data['msg'];
$sign_string = $client_id."".$msg."".$client_secret;
$sign = md5($sign_string);
if($sign != $data['sign']){
    exit();
}else{
    $result = array("code"=>0,"msg"=>"success") ;
    var_dump($result);
}


/**
 * msg是经过unicode（UTF-8）编码的消息对象,所以要进行解码
 */
$msg = json_decode(urldecode($msg),true);


if($data['type'] == "TRADE"){
    //处理交易信息
}

if($data['type'] == "ITEM"){
    //处理商品信息
}