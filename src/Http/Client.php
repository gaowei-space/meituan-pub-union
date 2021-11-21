<?php

namespace GaoweiSpace\MeituanPubUnion\Http;

use GaoweiSpace\MeituanPubUnion\Exception\HttpException;
use GaoweiSpace\MeituanPubUnion\Http\Response as HttpResponse;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7\Response;

/**
 * 接口调用的客户端类
 */
class Client
{
    /**
     * BASE API
     *
     * @var string
     */
    private static $BASE_URI = "https://union.dianping.com/";

    /**
     * SDK版本号
     */
    public static $VERSION = "1.0.0";

    /**
     * API协议版本号，默认 1.0
     */
    private static $API_VERSION = "1.0";

    /**
     * 接口超时时间，默认 5s
     */
    private static $TIME_OUT = "5";

    /**
     * GuzzleHttp client options
     *
     * @var array
     */
    private $clientOptions = [];

    /**
     * GuzzleHttp request options
     *
     * @var array
     */
    private $requestOptions = [];

    /**
     * GuzzleHttp request common query
     *
     * @var array
     */
    private $requestCommonQuery = [];

    /**
     * 开放平台分配的 appKey
     *
     * @var string
     */
    private $appKey;

    /**
     * 开放平台分配的 utmSource
     *
     * @var string
     */
    private $utmSource;

    /**
     * 构造函数
     *
     * @param $appKey 开放平台分配的 appKey
     * @param $utmSource 开放平台分配的 utmSource
     */
    public function __construct(string $appKey = '', string $utmSource = '')
    {
        $this->appKey    = $appKey;
        $this->utmSource = $utmSource;
    }

    /**
     * 设置超时
     *
     * @param integer $val
     * @return void
     */
    public function setTimeOut(int $val): void
    {
        $this->clientOptions['timeout'] = $val;
    }

    /**
     * 设置 GuzzleHttp client 参数
     *
     * @param array $clientOptions
     * @return void
     */
    public function setClientOptions(array $clientOptions)
    {
        $this->clientOptions = $clientOptions;
    }

    /**
     * 接口同步调用
     *
     * @return HttpResponse 接口返回信息
     */
    public function syncInvoke(Request $request)
    {
        $this->_setRequestCommonQuery($request);

        $this->_setRequestOptions($request);

        $response = $this->_handle($request);

        return $response;
    }

    /**
     * 设置通用 Query 参数
     *
     * @param Request $request
     * @return void
     */
    private function _setRequestCommonQuery(Request $request): void
    {
        $current = time();
        $this->requestCommonQuery['requestId']   = (string) rand(1, 99999999);
        $this->requestCommonQuery['utmSource']   = $this->utmSource;
        $this->requestCommonQuery['version']     = $request->getVersion();
        $this->requestCommonQuery['accessToken'] = $this->_encrypt($this->utmSource . $current);
        $this->requestCommonQuery['timestamp']   = $current;
    }

    /**
     * AES 加密
     *
     * @return string
     */
    private function _encrypt($data): string
    {
        $str = openssl_encrypt($data, 'AES-128-ECB', $this->appKey);
        return bin2hex(base64_decode($str));
    }

    /**
     * 设置 Request Options
     *
     * @param Request $request
     * @return void
     */
    private function _setRequestOptions(Request $request): void
    {
        $this->requestOptions = [
            'query'   => $this->_getQuery($request->getParamsMap()),
            'headers' => $this->_getRequestHeaders(),
        ];

        if ($request->getMethod() == 'post') {
            $this->requestOptions['json'] = $request->getParamsMap();
        }
    }

    /**
     * 获取全部 Query 参数
     *
     * @param array $params
     * @return array
     */
    private function _getQuery(array $params): array
    {
        return array_merge($params, $this->requestCommonQuery);
    }

    /**
     * 获取请求 Headers
     *
     * @return array
     */
    private function _getRequestHeaders(): array
    {
        $headers = [
            "Cache-Control"               => "no-cache",
            "Pragma"                      => "no-cache",
            "MeiTuanPubUnion-SDK-Version" => self::$VERSION,
            "MeiTuanPubUnion-SDK-Type"    => "PHP",
            'User-Agent'                  => "MeiTuanPubUnionSDK/" . self::$VERSION . "MeiTuanAPI/" . self::$API_VERSION . " (" . PHP_OS . ") PHP/" . PHP_VERSION,
        ];
        return $headers;
    }

    /**
     * 获取 GuzzleHttp client
     *
     * @return GuzzleHttp\Client
     */
    private function _getHttpClient()
    {
        return new GuzzleHttpClient($this->_getClientOptions());
    }

    /**
     * 获取 GuzzleHttp options
     *
     * @return array
     */
    private function _getClientOptions(): array
    {
        $default_options = [
            'timeout'  => self::$TIME_OUT,
            'base_uri' => self::$BASE_URI,
        ];

        return array_merge($default_options, $this->clientOptions);
    }

    /**
     * 设置自有 response
     *
     * @param Response $response
     * @return HttpResponse
     */
    private function _setSelfResponse(Response $response): HttpResponse
    {
        $self_response = new HttpResponse();
        $self_response->setStatusCode($response->getStatusCode());
        $self_response->setHeaders($response->getHeaders());
        $self_response->setBody($response->getBody());
        return $self_response;
    }

    /**
     * 发送请求，并设置 Response
     *
     * @param Request $request
     *
     * @return Response
     */
    private function _handle(Request $request)
    {
        try {
            $response = $this->_getHttpClient()->request($request->getMethod(), $request->getApiAction(), $this->requestOptions);
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }

        return $this->_setSelfResponse($response);
    }
}
