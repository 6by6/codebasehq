<?php

namespace SixBySix\CodebaseHq\Entity;

use JMS\Serializer\SerializationContext;
use SixBySix\CodebaseHq\Client;

abstract class AbstractResourceEntity extends AbstractEntity
{
    public function save()
    {
        if ($this->getId()) {
            // update existing instance
            $payload = $this->serialize(['update']);
            $method = 'put';
            $uri = sprintf("%s/%d", static::getResourceEndpoint(), $this->getId());
        } else {
            // create a new instance
            $payload = $this->serialize(['post']);
            $method = 'post';
            $uri = static::getResourceEndpoint();
        }

        $response = Client::$method($uri, $payload);

        if (isset($response[static::getIdKey()])) {
            /** @var string $prop */
            $prop = $this->getIdProp();

            $this->$prop = (int) $response[static::getIdKey()];
        }

        return $this;
    }

    public function delete()
    {
        if (!$this->getId()) {
            return;
        }

        $uri = sprintf("%s/%d", static::getResourceEndpoint(), $this->getId());

        Client::delete($uri);
    }

    protected function serialize(array $groups = [])
    {
        return $this->getSerializer()->toArray(
            $this,
            SerializationContext::create()->setGroups($groups)
        );
    }

    abstract public static function getIdKey();
    abstract public static function getIdProp();
    abstract public static function getResourceName();
    abstract public static function getResourceEndpoint();
}
