<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 30/06/2020
 * Time: 02:09
 */

namespace Fcristiano\LaravelCommon\ViewModel;


use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractViewModel
{
    /**
     * @param $date
     * @return string
     */
    protected static function date($date)
    {
        return $date instanceof \DateTime ? $date->format('Y-m-d H:i:s') : $date;
    }

    /**
     * @param LengthAwarePaginator $paginator
     * @return array
     */
    protected static function paginator(LengthAwarePaginator $paginator)
    {
        return [
            'totItems'      => $paginator->total(),
            'itemsPerPage'  => $paginator->perPage(),
            'totPages'      => $paginator->lastPage(),
            'currentPage'   => $paginator->currentPage(),
        ];
    }
}