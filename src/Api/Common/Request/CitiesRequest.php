<?php

namespace GaoweiSpace\MeituanPubUnion\Api\Common\Request;

use GaoweiSpace\MeituanPubUnion\Http\Request;

/**
 * 获取某个省份的所有城市
 */
class CitiesRequest extends Request
{
    public function __construct()
    {
    }

    protected function setUserParams(&$params): void
    {
        $this->setUserParam($params, "platformId", $this->platformId);
        $this->setUserParam($params, "provinceId", $this->provinceId);
    }

    public function getVersion(): string
    {
        return "1.0";
    }

    public function getDataType(): string
    {
        return "json";
    }

    public function getApiAction(): string
    {
        return sprintf("api/province/%s/cities", $this->provinceId);
    }

    public function getMethod(): string
    {
        return "get";
    }

    public function setPlatformId(int $platformId): void
    {
        $this->platformId = $platformId;
    }

    public function setProvinceId(int $provinceId): void
    {
        $this->provinceId = $provinceId;
    }
}
