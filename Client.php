<?php

namespace SixBySix\CodebaseHq;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 * @package SixBySix\CodebaseHq
 */
class Client
{
    const DOMAIN = 'http(s)://api3.codebasehq.com';

    /** @var  GuzzleClient */
    protected static $http;

    /** @var  string */
    protected static $accountName;

    /** @var  string */
    protected static $apiKey;

    /** @var  string */
    protected static $username;

    /**
     * @return mixed
     */
    public static function getAccountName()
    {
        return self::$accountName;
    }

    /**
     * @param mixed $accountName
     */
    public static function setAccountName($accountName)
    {
        self::$accountName = $accountName;
    }

    /**
     * @return mixed
     */
    public static function getApiKey()
    {
        return self::$apiKey;
    }

    /**
     * @param mixed $apiKey
     */
    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public static function getUsername()
    {
        return self::$username;
    }

    /**
     * @param mixed $username
     */
    public static function setUsername($username)
    {
        self::$username = $username;
    }


    protected static function get($resource)
    {

    }

    protected static function http()
    {
       if (!static::$http) {
           static::$http = new GuzzleClient([
               'base_url' => static::DOMAIN,
           ]);
       }

        return static::$http;
    }
}