<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 29/06/2020
 * Time: 11:24
 */

namespace Fcristiano\LaravelCommon\Services\Repository\Factory;


use Fcristiano\LaravelCommon\Services\Repository\Exception\ConfigException;
use Fcristiano\LaravelCommon\Services\Repository\RepositoryInterface;

class RepositoryFactoryConcrete implements RepositoryFactory
{
    /**
     * Populated with values found in fclc-models-repos.php config file.
     * Config file example:
     *
     * [
     *      'config' => [
     *          \Namespace\Path\Of\ModelA::class => \Namespace\Path\Of\RepositoryA::class,
     *          \Namespace\Path\Of\ModelB::class => \Namespace\Path\Of\RepositoryB::class,
     *          \Namespace\Path\Of\ModelC::class => \Namespace\Path\Of\RepositoryC::class,
     *          ...
     *      ]
     * ]
     *
     * @var array
     */
    protected $registered;

    /** @var array */
    protected $instances;


    /**
     * RepositoryFactoryConcrete constructor.
     * @param array $repositoryConfig
     */
    public function __construct(array $repositoryConfig)
    {
        $this->registered = $repositoryConfig;
    }


    /**
     * @param $modelClass
     * @return bool
     */
    public function has($modelClass)
    {
        return in_array($modelClass, array_keys($this->registered));
    }


    /**
     * @param $modelClass
     * @return RepositoryInterface
     * @throws ConfigException
     */
    public function get($modelClass)
    {
        if(isset($this->instances[$modelClass])) {
            if($this->instances[$modelClass] instanceof RepositoryInterface) {
                return $this->instances[$modelClass];
            }
        }

        if(!$this->has($modelClass)) {
            throw new ConfigException(sprintf(
                'Repository of model[%s] not registered.',
                $modelClass
            ));
        }

        $instance = new $this->registered[$modelClass]($modelClass);

        $this->instances[$modelClass] = $instance;

        return $instance;
    }

    /**
     * @param array $repositoryConfig
     */
    public function register(array $repositoryConfig)
    {
        $this->registered = $repositoryConfig;
    }
}