<?php

namespace SixBySix\CodebaseHq\Entity\Traits;

trait ParamUrl
{
    protected function formatUrl($url, array $scope)
    {
        foreach ($scope as $param => $value) {
            $url = str_replace("%{$param}%", $value, $url);
        }

        return $url;
    }

    abstract public static function getAllResourceName();
}