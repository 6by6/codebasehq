<?php

namespace SixBySix\CodebaseHq\Entity\Traits;

use JMS\Serializer\Serializer;
use SixBySix\CodebaseHq\Client;
use SixBySix\CodebaseHq\Entity\AbstractResourceEntity;
use SixBySix\CodebaseHq\Entity\Collection;
use SixBySix\CodebaseHq\Entity\Entity;
use SixBySix\CodebaseHq\Entity\Project;

trait GetAll
{
    use Get;

    public static function getAll(array $scope = [], array $params = [])
    {
        /** @var string $resourceName */
        $resourceName = static::formatUrl(
            self::getAllResourceName(),
            $scope
        );

        /** @var Collection $collection */
        $collection = new Collection(
            $resourceName,
            static::class,
            $params,
            $scope
        );

        return $collection;
    }

    /**
     * @return string
     */
    abstract protected static function getAllResourceName();
}