<?php

namespace SixBySix\CodebaseHq\Entity\Traits;

trait Get
{
    protected static function formatUrl($url, array $scope)
    {
        foreach ($scope as $param => $value) {
            $url = str_replace("%$param%", $value, $url);
        }

        return $url;
    }
}