<?php

/*
 * This file is part of the gaowei-space/meituan-pub-union.
 *
 * (c) gaowei <huyao9950@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace GaoweiSpace\MeituanPubUnion\Http;

/**
 * 请求基类
 */
abstract class Request
{
    public function __construct()
    {
    }

    abstract public function getVersion(): string;

    abstract public function getDataType(): string;

    abstract public function getApiAction(): string;

    abstract public function getMethod(): string;

    abstract protected function setUserParams(&$var): void;

    final public function getParamsMap(): array
    {
        $paramsMap = [];
        $this->setUserParams($paramsMap);
        return $paramsMap;
    }

    final protected function setUserParam(&$paramMap, $name, $param): void
    {
        if (!is_null($param) && $param !== "") {
            $paramMap[$name] = $param;
        }
    }
}
