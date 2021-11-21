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
 * Response 类
 */

class Response
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var Header
     */
    protected $headers;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var array|null
     */
    protected $content;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return Header
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param Header $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return array|null
     */
    public function getContent()
    {
        if ($this->content === null) {
            $this->content = json_decode($this->getBody(), true);
        }
        return $this->content;
    }

    /**
     * @param array|null $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
