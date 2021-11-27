<h1 align="center"> meituan-pub-union </h1>

<p align="center"> 🌈 美团分销联盟 PHP-SDK. </p>


![GitHub branch checks state](https://img.shields.io/github/checks-status/gaowei-space/meituan-pub-union/main)
[![Latest Release](https://img.shields.io/github/v/release/gaowei-space/meituan-pub-union)](https://github.com/gaowei-space/meituan-pub-union/releases)
![StyleCI build status](https://github.styleci.io/repos/430381661/shield)
[![PHP Version](https://img.shields.io/packagist/php-v/gaowei-space/meituan-pub-union)](https://www.php.net/)
[![License](https://img.shields.io/github/license/gaowei-space/meituan-pub-union)](https://github.com/gaowei-space/meituan-pub-union/LICENSE)

## 安装

```shell
$ composer require gaowei-space/meituan-pub-union -vvv
```

## 配置

在使用本扩展之前，你需要去 [美团分销联盟](https://pub.meituan.com) 注册账号，签约入驻后创建应用，获取应用的 app_key 和 utm_source。

## 支持
- ✅ 获取全国省份 `ProvinceAllRequest`
- ✅ 获取某省份的城市 `CitiesRequest`
- ✅ 获取某个城市的一级类目包含的二级类目信息 `CategoriesRequest`
- ✅ 获取某个城市的商圈信息（点评）`RegionsByDianPingRequest`
- ✅ 获取某个城市的商圈信息（美团）`RegionsByMeiTuanRequest`
- ✅ 到店商品搜索 `SearchDealsRequest`
- ✅ 分销取链 `LinksRequest`
- ✅ 异常订单数据 `OrdersAbnormalRequest`
- ✅ CPA订单数据 `OrdersCPARequest`
- ✅ CPS订单数据 `OrdersCPSRequest`
- 🆕 其他暂未支持，接下来会支持完善到店模块接口

## 使用
### 获取某个省份的城市列表
```php
use GaoweiSpace\MeituanPubUnion\Api\Common\Request\CitiesRequest;
use GaoweiSpace\MeituanPubUnion\Http\Client;

$app_key    = 'xxxxxxxxxx';
$utm_source = 'xxxxxxxxxx';

// 实例化获取城市的请求类
$request = new CitiesRequest();
// 设置省份ID
$request->setProvinceId(1);

// 实例客户端类
$client = new Client($app_key, $utm_source);

// 发送请求调用接口
$response = $client->syncInvoke($request);
```
### 请求参数

> 请求参数的设置，请结合 [美团分销联盟API文档](https://pub.meituan.com/#/api-doc)，确认要使用的参数，调用对应请求类的对应方法进行设置

Request 类中对于各个参数都已经内置了 set前缀的设置方法，比如：
```php
public function setUtmSource(string $utmSource): void
{
    $this->utmSource = $utmSource;
}
```

调用设置参数
```php
$request->setUtmSource('***');
```

### 在 Laravel 中使用

在 Laravel 中使用也是同样的安装方式，配置写在 config/services.php 中：
```php

'meituan' => [
    'pub_union' => [
        'app_key' => env('MEITUAN_PUB_UNION_APP_KEY'),
        'utm_source' => env('MEITUAN_PUB_UNION_UTM_SOURCE'),
    ]
]

```
然后在 .env 中配置：
```
MEITUAN_PUB_UNION_APP_KEY=xxxxxxxxxxxxxxxxxxxxx
MEITUAN_PUB_UNION_UTM_SOURCE=xxxxxxxxxxxxxxxxxxxxx
```

### 可以用两种方式来获取 GaoweiSpace\MeituanPubUnion\Http\Client 实例：
#### 方法参数注入
```php
use GaoweiSpace\MeituanPubUnion\Http\Client;

public function getCities(Client $client)
{
    $response = $client->syncInvoke($request);
}

```

#### 服务名访问
```php

public function getCities()
{
    $response = app('MeituanPubUnion')->syncInvoke($request);
}

```

## 参考
- [美团分销联盟API文档](https://pub.meituan.com/#/api-doc)

## License

MIT