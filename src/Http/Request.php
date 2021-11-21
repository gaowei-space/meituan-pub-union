<?php

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

    final public function getParamsMap(): array
    {
        $paramsMap = [];
        $this->setUserParams($paramsMap);
        return $paramsMap;
    }

    abstract protected function setUserParams(&$var): void;

    final protected function setUserParam(&$paramMap, $name, $param): void
    {
        if (!is_null($param) && $param !== "") {
            if ($this->isPrimaryType($param)) {
                $paramMap[$name] = $param;
            } else {
                $paramMap[$name] = json_encode($param);
            }
        }
    }

    private function isPrimaryType($param): bool
    {
        if (is_bool($param)) {
            return true;
        } elseif (is_integer($param)) {
            return true;
        } elseif (is_long($param)) {
            return true;
        } elseif (is_float($param)) {
            return true;
        } elseif (is_double($param)) {
            return true;
        } elseif (is_numeric($param)) {
            return true;
        } elseif (is_array($param)) {
            return true;
        } else {
            return is_string($param);
        }
    }
}
