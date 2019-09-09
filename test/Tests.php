<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/6
 * Time: 20:27
 */
//引入vendor下的autoloas.php
require 'vendor/autoload.php';
//实例化对象
date_default_timezone_set("PRC");
$aop = new alipay\AlipayClient();

$aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
$aop->appId = "appid";
$aop->rsaPrivateKey = "用户私钥";
$aop->format = "json";
$aop->charset = "UTF-8";
$aop->signType = "RSA2";
$aop->alipayrsaPublicKey = '支付宝公钥';////实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
$request = new alipay\request\AlipayTradeAppPayRequest();
//SDK已经封装掉了公共参数，这里只需要传入业务参数
/*$bizcontent = "{\"body\":\"我是测试数据\","
	. "\"subject\": \"App支付测试\","
	. "\"out_trade_no\": \"asdasdasdadasd11\","
	. "\"timeout_express\": \"30m\","
	. "\"total_amount\": \"0.01\","
	. "\"product_code\":\"QUICK_MSECURITY_PAY\""
	. "}";*/
$data["total_amount"]="0.01";
$data["subject"]="预定酒店消费";
$data["out_trade_no"]="JD201909051809240201";
$data["product_code"]="QUICK_MSECURITY_PAY";

$bizcontent=json_encode($data,JSON_UNESCAPED_UNICODE);
//$bizcontent='{"productCode":"QUICK_MSECURITY_PAY","body":"","subject":"预定酒店消费","out_trade_no":"JD201909051809240201","total_amount":2000.00,"timeout_express":"1m"}';
$request->setNotifyUrl("https://www.jucheng01.net/infert");
$request->setBizContent($bizcontent);
//这里和普通的接口调用不同，使用的是sdkExecute
$response = $aop->sdkExecute($request);
var_dump($response);die();

