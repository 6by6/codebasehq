<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use SixBySix\CodebaseHq\Exception;
use SixBySix\CodebaseHq\Client;

abstract class AbstractEntity
{
    /**
     * @var Serializer
     */
    protected static $serializer;
    
    public static function deserialize($data)
    {
        return static::getSerializer()->deserialize(
            $data,
            get_called_class(),
            'xml',
            DeserializationContext::create()->setGroups(['get'])
        );
    }

    /**
     * @return Serializer
     */
    protected static function getSerializer()
    {
        if (!self::$serializer) {
            self::$serializer = SerializerBuilder::create()->build();
        }

        return self::$serializer;
    }
}
