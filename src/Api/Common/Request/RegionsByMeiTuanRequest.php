<?php

namespace GaoweiSpace\MeituanPubUnion\Api\Common\Request;

use GaoweiSpace\MeituanPubUnion\Http\Request;

/**
 * 获取某个城市的商圈信息（美团）
 */
class RegionsByMeiTuanRequest extends Request
{
    public function __construct()
    {
    }

    protected function setUserParams(&$params): void
    {
        $this->setUserParam($params, "cityId", $this->cityId);
        $this->setUserParam($params, "includeHot", $this->includeHot);
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
        return sprintf("api/mt/city/%s/regions", $this->cityId);
    }

    public function getMethod(): string
    {
        return "get";
    }

    public function setCityId(int $cityId): void
    {
        $this->cityId = $cityId;
    }

    public function setIncludeHot(bool $includeHot): void
    {
        $this->includeHot = $includeHot;
    }
}
