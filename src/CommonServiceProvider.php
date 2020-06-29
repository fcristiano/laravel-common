<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 29/06/2020
 * Time: 11:23
 */

namespace Fcristiano\LaravelCommon;


use Fcristiano\LaravelCommon\Services\Repository\Factory\RepositoryFactoryProvider;


class CommonServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->register(RepositoryFactoryProvider::class);
    }
}