<?php

namespace SixBySix\CodebaseHq\Entity\Traits;

use JMS\Serializer\Serializer;
use SixBySix\CodebaseHq\Client;

trait GetOne
{
    use Get;

    public static function getOne($id, $scope = [])
    {

        $scope['id'] = $id;

        /** @var string $resourceName */
        $resourceName = static::formatUrl(
            self::getOneResourceName(),
            $scope
        );

        $one = Client::get($resourceName);

        return static::deserialize($one->asXML());
    }

    abstract protected static function getOneNodeName();
}