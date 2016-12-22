<?php

namespace SixBySix\CodebaseHq\Entity\Traits;

use SixBySix\CodebaseHq\Client;
use SixBySix\CodebaseHq\Exception\MethodNotImplementedException;

trait CanSave
{
    public function save(array $scope = [])
    {
        /** @var string $url */
        $url = static::getPostResourceName();

        /** @var string $group */
        $group = 'post';

        if ($this->getId() && static::getPutResourceName()) {
            $url = static::getPutResourceName();
            $group = 'update';
        }

        foreach ($scope as $param => $value) {
            $url = str_replace("%$param%", $value, $url);
        }

        $xml = self::serialize([$group]);

        $response = Client::post($url, $xml);

        if (method_exists($this, 'setId')) {
            $this->setId((int) $response->id);
        }
    }

    abstract protected static function getPostResourceName();

    abstract protected static function getPutResourceName();
}