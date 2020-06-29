<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 29/06/2020
 * Time: 11:23
 */

namespace Fcristiano\LaravelCommon\Services\Repository;


use Illuminate\Database\Eloquent\Builder;

abstract class AbstractRepository implements RepositoryInterface
{
    /** @var string */
    protected $modelClass = null;

    /**
     * AbstractRepository constructor.
     * @param $modelClass
     */
    public function __construct($modelClass)
    {
        $this->modelClass = $modelClass;
    }


    /**
     * Default Laravel "firstOrNull" doesn't check if results are more then one, this may be a problem in some scenarios
     * @param Builder $query
     * @return mixed|null
     */
    protected function getOneOrNull(Builder $query)
    {
        $collection = $query->get();

        switch($collection->count()) {
            case 0:
                return null;

            case 1:
                return $collection->first();

            default:
                $ids = [];
                foreach($collection as $item) {
                    $ids []= $item->id;
                }

                throw new \RuntimeException(sprintf(
                    "Expected one or null result for model[%s], [%d] found. Record ids[%s]",
                    $this->modelClass,
                    $collection->count(),
                    implode(', ', $ids)
                ));
        }
    }
}