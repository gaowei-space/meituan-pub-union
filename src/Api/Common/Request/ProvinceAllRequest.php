<?php

namespace GaoweiSpace\MeituanPubUnion\Api\Common\Request;

use GaoweiSpace\MeituanPubUnion\Http\Request;

class ProvinceAllRequest extends Request
{
    public function __construct()
    {
    }

    protected function setUserParams(&$params): void
    {
        $this->setUserParam($params, "platformId", $this->platformId);
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
        return "api/province/all";
    }

    public function getMethod(): string
    {
        return "get";
    }

    public function setPlatformId(int $platformId): void
    {
        $this->platformId = $platformId;
    }
}
