# alipay
===

## 支付宝支付

目前只支持支付宝的app唤起支付、回调、退款：

## 安装

### Composer

alipay采用composer进行安装，要使用alipay功能，只需要在composer.json中添加如下依赖：

```json
{
  "require": {
    "jucheng/alipay": "1.*"
  }
}
```


### 手动

1. 手动下载或clone最新版本alipay代码
2. 把alipay放入项目目录
3. `require` alipay src目录下面的AlipayClient.php，即可使用，如把alipay放在当前目录下，只需要:

```php
require __DIR__ . "/alipay/src/AlipayClient.php";
```

## 用法

- **准备必要参数**

```php
//AppID
$appid = 1400009099; 

// 用户私钥
$rsaPrivateKey = "用户私钥";

//支付宝公钥
$alipayrsaPublicKey="支付宝公钥";

//支付回调地址
$notifyUrl="https://www.baidu.com";
```

- **app唤起支付**

```php
use alipay;
$app_client=new alipay\AlipayClient($appid,$rsaPrivateKey,$alipayrsaPublicKey);
$data["total_amount"]="0.01";
$data["subject"]="预定酒店消费";
$data["out_trade_no"]="JD201909051809240201";
$data["product_code"]="QUICK_MSECURITY_PAY";
$result=$app_client->appPay($data,$notifyUrl);
```

> `Note` 如需要自定义data参数 请查看支付宝官方文档 https://docs.open.alipay.com/api_1/alipay.trade.app.pay
> `Note` 将$result传给手机端唤起支付。

- **回调参数验签**

```php
use alipay;
$app_client=new alipay\AlipayClient($appid,$rsaPrivateKey,$alipayrsaPublicKey);
$flag = $app_client->rsaCheckV1($_POST, NULL, "RSA2");
```

> `Note` 对$flag进行操作。

- **退款**

```php
use alipay;
$app_client=new alipay\AlipayClient($appid,$rsaPrivateKey,$alipayrsaPublicKey);
$data["out_trade_no"]="JD201909051809240201";
$data["trade_no"]="2019090922001444760542604693";
$data["refund_amount"]="0.01";
$result=$app_client->refundOrder($data);
```

> `Note` 退款是否成功对$result进行判断。

> `Note` 所有方法错误码请以官方错误码为准 https://docs.open.alipay.com/api_1/alipay.trade.app.pay




