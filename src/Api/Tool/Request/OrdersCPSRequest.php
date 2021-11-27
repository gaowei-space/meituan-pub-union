<?php

/*
 * This file is part of the gaowei-space/meituan-pub-union.
 *
 * (c) gaowei <huyao9950@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace GaoweiSpace\MeituanPubUnion\Api\Tool\Request;

use GaoweiSpace\MeituanPubUnion\Http\Request;

/**
 * 订单接口 - CPS
 */
class OrdersCPSRequest extends Request
{
    protected $page = 1;    // 是
    protected $size = 100;  // 是

    protected $startVerifyDate   = null;  // 否
    protected $endVerifyDate     = null;  // 否
    protected $startAddDate      = null;  // 否
    protected $endAddDate        = null;  // 否
    protected $startModifyDate   = null;  // 否
    protected $endModifyDate     = null;  // 否
    protected $uniqueItemIds     = null;  // 否
    protected $viewOrderIds      = null;  // 否
    protected $orderItemTypes    = null;  // 否
    protected $itemBizStatusList = null;  // 否
    protected $itemStatusList    = null;  // 否
    protected $promotionId       = null;  // 否
    protected $queryType         = null;  // 否
    protected $startTime         = null;  // 否
    protected $endTime           = null;  // 否

    public function __construct()
    {
    }

    protected function setUserParams(&$params): void
    {
        // 必传参数
        $this->setUserParam($params, "page", $this->page);
        $this->setUserParam($params, "size", $this->size);

        // 非必传参数
        !is_null($this->startVerifyDate) && $this->setUserParam($params, 'startVerifyDate', $this->startVerifyDate);
        !is_null($this->endVerifyDate) && $this->setUserParam($params, 'endVerifyDate', $this->endVerifyDate);
        !is_null($this->startAddDate) && $this->setUserParam($params, 'startAddDate', $this->startAddDate);
        !is_null($this->endAddDate) && $this->setUserParam($params, 'endAddDate', $this->endAddDate);
        !is_null($this->startModifyDate) && $this->setUserParam($params, 'startModifyDate', $this->startModifyDate);
        !is_null($this->endModifyDate) && $this->setUserParam($params, 'endModifyDate', $this->endModifyDate);
        !is_null($this->uniqueItemIds) && $this->setUserParam($params, 'uniqueItemIds', $this->uniqueItemIds);
        !is_null($this->viewOrderIds) && $this->setUserParam($params, 'viewOrderIds', $this->viewOrderIds);
        !is_null($this->orderItemTypes) && $this->setUserParam($params, 'orderItemTypes', $this->orderItemTypes);
        !is_null($this->itemBizStatusList) && $this->setUserParam($params, 'itemBizStatusList', $this->itemBizStatusList);
        !is_null($this->itemStatusList) && $this->setUserParam($params, 'itemStatusList', $this->itemStatusList);
        !is_null($this->promotionId) && $this->setUserParam($params, 'promotionId', $this->promotionId);
        !is_null($this->queryType) && $this->setUserParam($params, 'queryType', $this->queryType);
        !is_null($this->startTime) && $this->setUserParam($params, 'startTime', $this->startTime);
        !is_null($this->endTime) && $this->setUserParam($params, 'endTime', $this->endTime);
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
        return '/data/promote/verify/item';
    }

    public function getMethod(): string
    {
        return "get";
    }

    public function setPage(string $page)
    {
        $this->page = $page;
    }

    public function setSize(string $size)
    {
        $this->size = $size;
    }

    public function setStartVerifyDate(string $startVerifyDate)
    {
        $this->startVerifyDate = $startVerifyDate;
    }

    public function setEndVerifyDate(string $endVerifyDate)
    {
        $this->endVerifyDate = $endVerifyDate;
    }

    public function setStartAddDate(string $startAddDate)
    {
        $this->startAddDate = $startAddDate;
    }

    public function setEndAddDate(string $endAddDate)
    {
        $this->endAddDate = $endAddDate;
    }

    public function setStartModifyDate(string $startModifyDate)
    {
        $this->startModifyDate = $startModifyDate;
    }

    public function setEndModifyDate(string $endModifyDate)
    {
        $this->endModifyDate = $endModifyDate;
    }

    public function setUniqueItemIds(array $uniqueItemIds)
    {
        $this->uniqueItemIds = $uniqueItemIds;
    }

    public function setViewOrderIds(array $viewOrderIds)
    {
        $this->viewOrderIds = $viewOrderIds;
    }

    public function setOrderItemTypes(string $orderItemTypes)
    {
        $this->orderItemTypes = $orderItemTypes;
    }

    public function setItemBizStatusList(array $itemBizStatusList)
    {
        $this->itemBizStatusList = $itemBizStatusList;
    }

    public function setItemStatusList(array $itemStatusList)
    {
        $this->itemStatusList = $itemStatusList;
    }

    public function setPromotionId(string $promotionId)
    {
        $this->promotionId = $promotionId;
    }

    public function setQueryType(int $queryType)
    {
        $this->queryType = $queryType;
    }

    public function setStartTime(string $startTime)
    {
        $this->startTime = $startTime;
    }

    public function setEndTime(string $endTime)
    {
        $this->endTime = $endTime;
    }
}
