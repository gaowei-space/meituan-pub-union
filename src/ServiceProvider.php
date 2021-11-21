<?php

/*
 * This file is part of the gaowei-space/weather.
 *
 * (c) gaowei <huyao9950@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace GaoweiSpace\MeituanPubUnion;

use GaoweiSpace\MeituanPubUnion\Http\Client;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Client::class, function () {
            return new Client(config('services.meituan.pub_union.app_key'), config('services.meituan.pub_union.utm_source'));
        });
        $this->app->alias(Client::class, 'MeituanPubUnion');
    }

    public function provides()
    {
        return [Client::class, 'MeituanPubUnion'];
    }
}
