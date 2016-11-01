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
    public static function getAll(array $scope = [])
    {
        /** @var string $resourceName */
        $resourceName = $this->formatUrl(
            self::getAllResourceName(),
        );

        foreach ($scope as $param => $value) {

        }

        /** @var Collection $collection */
        $collection = new Collection(
            $resourceName,
            static::class
        );

        return $collection;
    }

    /**
     * @return string
     */
    abstract protected static function getAllResourceName();

    abstract protected function formatUrl($url, array $scope);
}