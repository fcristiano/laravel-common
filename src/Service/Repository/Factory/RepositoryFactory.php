<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 29/06/2020
 * Time: 11:24
 */

namespace Fcristiano\LaravelCommon\Services\Repository\Factory;


interface RepositoryFactory
{
    /**
     * Check if ModelClass is registered and has a repository
     *
     * @param $modelClass
     * @return bool
     */
    public function has($modelClass);

    /**
     * Get repository instance by ModelClass
     *
     * @param $modelClass
     * @return mixed
     */
    public function get($modelClass);
}