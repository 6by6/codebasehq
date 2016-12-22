<?php

namespace SixBySix\CodebaseHq;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 * @package SixBySix\CodebaseHq
 */
class Client
{
    const DOMAIN = 'https://api3.codebasehq.com';

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

    public static function init($accountName, $username, $apiKey)
    {
        static::setAccountName($accountName);
        static::setUsername($username);
        static::setApiKey($apiKey);
    }

    /**
     * GET method
     *
     * @param $resource
     * @param array $opts
     * @return \SimpleXMLElement
     */
    public static function get($resource, array $opts = [])
    {
        $opts = ['query' => $opts];
        $opts = static::prepareRequestOpts($opts);

        /** @var Response $response */
        $response = self::http()->get($resource, $opts);

        /** @var string $body */
        $body = (string) $response->getBody();

        /** @var \SimpleXMLElement $xml */
        $xml = simplexml_load_string($body);

        return $xml;
    }

    /**
     * GET method
     *
     * @param $resource
     * @param array $opts
     * @return \SimpleXMLElement
     */
    public static function post($resource, $xml, array $opts = [])
    {
        $opts = [
            'query' => $opts,
            'body' => (string) $xml,
        ];
        $opts = static::prepareRequestOpts($opts);

        /** @var Response $response */
        $response = self::http()->post($resource, $opts);

        /** @var string $body */
        $body = (string) $response->getBody();

        /** @var \SimpleXMLElement $xml */
        $xml = simplexml_load_string($body);

        return $xml;
    }

    /**
     * Set auth + headers for each request
     *
     * @param array $opts
     * @return array
     */
    protected static function prepareRequestOpts(array $opts = [])
    {
        $opts['auth'] = [
            static::getAccountName() . "/" . static::getUsername(),
            static::getApiKey(),
        ];

        $opts['headers'] = [
            'User-Agent' => 'CodebaseHq API for PHP (daniel@sixbysix.co.uk)',
            'Content-Type' => 'application/xml',
            'Accept' => 'application/xml',
        ];

        return $opts;
    }

    /**
     * Getter for http client
     *
     * @return GuzzleClient
     */
    protected static function http()
    {
        if (!static::$http) {
            static::$http = new GuzzleClient([
                'base_uri' => static::DOMAIN,
            ]);
        }

        return static::$http;
    }
}