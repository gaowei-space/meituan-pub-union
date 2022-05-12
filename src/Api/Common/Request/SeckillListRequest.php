<?php


namespace GaoweiSpace\MeituanPubUnion\Api\Common\Request;

use GaoweiSpace\MeituanPubUnion\Http\Request;

class SeckillListRequest extends Request
{
    protected $promotionId;

    protected function setUserParams(&$params): void
    {
        //必填
        $this->setUserParam($params, "cityId", $this->cityId);
        $this->setUserParam($params, "platformId", $this->platformId);
        $this->setUserParam($params, "showId", $this->showId);
        $this->setUserParam($params, "phone", $this->phone);
        $this->setUserParam($params, "os", $this->os);
        $this->setUserParam($params, "lat", $this->lat);
        $this->setUserParam($params, "lng", $this->lng);
        $this->setUserParam($params, "page", $this->page);
        $this->setUserParam($params, "utmMedium", $this->utmMedium);

        //非必填
        $this->promotionId && $this->setUserParam($params, "promotionId", $this->promotionId);
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

    public function setPlatformId(int $platformId): void
    {
        $this->platformId = $platformId;
    }

    public function setShowId(int $showId): void
    {
        $this->showId = $showId;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setOs(int $os): void
    {
        $this->os = $os;
    }

    public function setLat( $lat): void
    {
        $this->os = $lat;
    }

    public function setLng( $lng): void
    {
        $this->lng = $lng;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    public function setUtmMedium(string $utmMedium): void
    {
        $this->utmMedium = $utmMedium;
    }

    public function setPromotionId(string $promotionId): void
    {
        $this->promotionId = $promotionId;
    }
}