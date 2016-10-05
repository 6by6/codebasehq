<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\SerializationContext;
use SixBySix\CodebaseHq\Client;

abstract class AbstractResourceEntity extends AbstractEntity
{
    protected function serialize(array $groups = [])
    {
        return $this->getSerializer()->toArray(
            $this,
            SerializationContext::create()->setGroups($groups)
        );
    }
}
