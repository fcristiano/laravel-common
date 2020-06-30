<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 30/06/2020
 * Time: 02:09
 */

namespace Fcristiano\LaravelCommon\JsonViewModel;


use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractJsonViewModel
{
    /**
     * @param LengthAwarePaginator $paginator
     * @return array
     */
    protected static function paginatorViewModel(LengthAwarePaginator $paginator)
    {
        return [
            'totItems'      => $paginator->total(),
            'itemsPerPage'  => $paginator->perPage(),
            'totPages'      => $paginator->lastPage(),
            'currentPage'   => $paginator->currentPage(),
        ];
    }
}