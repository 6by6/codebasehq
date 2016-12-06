<?php

namespace SixBySix\CodebaseHq\Entity\Traits;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\DeserializationContext;

trait Serializable
{
    /**
     * @var Serializer
     */
    protected static $serializer;

    protected function serialize(array $groups = [])
    {
        return $this->getSerializer()->toArray(
            $this,
            SerializationContext::create()->setGroups($groups)
        );
    }

    public static function deserialize($data)
    {
        $entity = static::getSerializer()->deserialize(
            $data,
            get_called_class(),
            'xml',
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