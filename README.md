<h1 align="center"> meituan-pub-union </h1>

<p align="center"> 🌈 美团分销联盟 PHP-SDK. </p>

![StyleCI build status](https://github.styleci.io/repos/430381661/shield)

## 安装

```shell
$ composer require gaowei-space/meituan-pub-union -vvv
```

## 配置

在使用本扩展之前，你需要去 [美团分销联盟](https://pub.meituan.com) 注册账号，签约入驻后创建应用，获取应用的 app_key 和 utm_source。

## API支持
- ✅ 获取全国省份
- ✅ 获取某省份的城市
- ✅ 获取某个城市的一级类目包含的二级类目信息
- ✅ 获取某个城市的商圈信息（点评）
- ✅ 获取某个城市的商圈信息（美团）
- 🆕 其他暂未支持，接下来会支持获取分销订单等


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

## 在 Laravel 中使用

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