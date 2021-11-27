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
 * 订单接口 - 异常订单
 */
class OrdersAbnormalRequest extends Request
{
    protected $page = 1;    // 是
    protected $size = 100;  // 是

    protected $queryType         = null;  // 否
    protected $startTime         = null;  // 否
    protected $endTime           = null;  // 否
    protected $orderItemTypeList = null;  // 否

    public function __construct()
    {
    }

    protected function setUserParams(&$params): void
    {
        // 必传参数
        $this->setUserParam($params, "page", $this->page);
        $this->setUserParam($params, "size", $this->size);

        // 非必传参数
        !is_null($this->queryType) && $this->setUserParam($params, 'queryType', $this->queryType);
        !is_null($this->startTime) && $this->setUserParam($params, 'startTime', $this->startTime);
        !is_null($this->endTime) && $this->setUserParam($params, 'endTime', $this->endTime);
        !is_null($this->orderItemTypeList) && $this->setUserParam($params, 'orderItemTypeList', $this->orderItemTypeList);
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
        return '/data/promote/abnormal/item';
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

    public function setOrderItemTypeList(array $orderItemTypeList)
    {
        $this->orderItemTypeList = $orderItemTypeList;
    }
}
