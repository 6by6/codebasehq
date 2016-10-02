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

    public static function get($resource, array $opts = [])
    {
        $opts = ['query' => $opts];
        $opts = static::prepareRequestOpts($opts);

        /** @var Response $response */
        $response = self::http()->get($resource, $opts);

        $response = json_decode("{$response->getBody()}", $assoc = true);

        if (isset($response['count']) && $response['count'] == 0) {
            return [];
        }

        return $response;
    }

    public static function post($resource, array $body = [], array $opts = [])
    {
        $opts['form_params'] = $body;
        $opts = static::prepareRequestOpts($opts);

        /** @var ResponseInterface $response */
        $response = self::http()->post($resource, $opts);

        /** @var string $body */
        $body = (string) $response->getBody();

        /** @var array $json */
        $json = json_decode($body, $assoc = true);

        return $json;
    }

    public static function put($resource, array $body = [], array $opts = [])
    {
        $opts['form_params'] = $body;
        $opts = static::prepareRequestOpts($opts);

        /** @var ResponseInterface $response */
        $response = self::http()->put($resource, $opts);

        /** @var string $body */
        $body = (string) $response->getBody();

        /** @var array $json */
        $json = json_decode($body, $assoc = true);

        return $json;
    }

    public static function delete($resource)
    {
        /** @var array $opts */
        $opts = static::prepareRequestOpts([]);

        self::http()->delete($resource, $opts);
    }

    protected static function prepareRequestOpts(array $opts = [])
    {
        $opts['headers'] = [
            'User-Agent' => 'Float API for PHP (daniel@sixbysix.co.uk)',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Accept' => 'application/json',
            'Authorization' => sprintf('Bearer %s', self::getApiKey()),
        ];

        return $opts;
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