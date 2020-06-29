<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 29/06/2020
 * Time: 11:23
 */

namespace Fcristiano\LaravelCommon\Services\Repository;


interface RepositoryInterface
{
    public function getById($id);
}