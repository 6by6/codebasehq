<?php

namespace SixBySix\CodebaseHq\Entity\Traits;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\DeserializationContext;

trait Serializable
{
    /**
     * @var Serializer
     */
    protected static $serializer;

    protected function serialize(array $groups = [], $format = 'xml')
    {
        return $this->getSerializer()->serialize(
            $this,
            $format,
            SerializationContext::create()->setGroups($groups)
        );
    }

    public static function deserialize($data, $toClass = null, $format = 'xml')
    {
        $toClass = ($toClass !== null) ? $toClass : get_called_class();

        $entity = static::getSerializer()->deserialize(
            $data,
            $toClass,
            $format,
            DeserializationContext::create()->setGroups(['get'])
        );

        $entity->origXml = $data;

        return $entity;
    }

    /**
     * @return Serializer
     */
    protected static function getSerializer()
    {
        if (!self::$serializer) {
            self::$serializer = SerializerBuilder::create('xml')->build();
        }

        return self::$serializer;
    }
}