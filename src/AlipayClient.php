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

	public function test(){
		echo $this->gatewayUrl;
	}

}