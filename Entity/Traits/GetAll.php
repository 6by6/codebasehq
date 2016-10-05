<?php

namespace SixBySix\CodebaseHq\Entity\Traits;

use JMS\Serializer\Serializer;
use SixBySix\CodebaseHq\Client;

trait GetAll
{
    public static function getAll()
    {
        $collection = Client::get("project_groups");

        foreach ($collection->{'project-group'} as $entityData) {
            $entity = static::deserialize($entityData);
            $collection[] = $entity;
        }
        static::deserialize($collection);
    }

    /**
     * @param $data
     */
    abstract public static function deserialize($data);
}