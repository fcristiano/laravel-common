<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 29/06/2020
 * Time: 11:24
 */

namespace Fcristiano\LaravelCommon\Services\Repository\Factory;


use Fcristiano\LaravelCommon\Services\Repository\Exception\ConfigException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class RepositoryFactoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RepositoryFactory::class, function ($app) {

            $repositoryConfig = Config::get('fclc-models-repos.config', null);
            if($repositoryConfig === null) {
                throw new ConfigException(sprintf('fclc-models-repos config not found'));
            }

            if(!is_array($repositoryConfig)) {
                throw new ConfigException(sprintf('fclc-models-repos config is not valid, array expected'));
            }

            return new RepositoryFactoryConcrete($repositoryConfig);
        });
    }
}