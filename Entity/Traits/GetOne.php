<?php

namespace SixBySix\CodebaseHq\Entity\Traits;

use JMS\Serializer\Serializer;
use SixBySix\CodebaseHq\Client;

trait GetOne
{
    public static function getOne($id)
    {
        /** @var string $resourceName */
        $resourceName = self::getOneResourceName();

        $one = Client::get($resourceName);

        $entity = static::deserialize($one->asXML());
        $collection[] = $entity;

        static::deserialize($collection);
    }

    abstract protected static function getOneNodeName();
}