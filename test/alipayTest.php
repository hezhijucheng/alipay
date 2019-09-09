<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/9
 * Time: 14:46
 */
require 'vendor/autoload.php';
//实例化对象
date_default_timezone_set("PRC");

$app_client=new alipay\AlipayClient();
/*$data["total_amount"]="0.01";
$data["subject"]="预定酒店消费";
$data["out_trade_no"]="JD201909051809240201";
$data["product_code"]="QUICK_MSECURITY_PAY";*/
$data["out_trade_no"]="JD201909051809240201";
$data["trade_no"]="2019090922001444760542604693";
$data["refund_amount"]="0.01";


$result=$app_client->refundOrder($data);
echo $result;

