<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/6
 * Time: 17:48
 */
namespace alipay;
use alipay\AopClient;


class AlipayClient extends  AopClient {

	public function __construct($appid,$rsaPrivateKey,$alipayrsaPublicKey)
	{
		$this->appId = $appid;
		$this->rsaPrivateKey = $rsaPrivateKey;
		$this->alipayrsaPublicKey = $alipayrsaPublicKey;////实例化具体API对应的request类,类名称和接口名称对应,当前调用接口名称：alipay.trade.app.pay
	}

	public function appPay($data,$notifyUrl){
		$aop = new AopClient();
		$aop->signType = "RSA2";
		$request = new request\AlipayTradeAppPayRequest();
		$bizcontent=json_encode($data,JSON_UNESCAPED_UNICODE);
		$request->setNotifyUrl($notifyUrl);
		$request->setBizContent($bizcontent);
		$response = $aop->sdkExecute($request);
		return $response;
	}

}