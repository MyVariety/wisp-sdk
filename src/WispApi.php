<?php
namespace MyVariety\WispSDK;

/**
 * Wisp API
 *
 * @copyright Copyright (c) 2023, MyVariety LLC
 * @license https://www.myvariety.net/legal The MyVariety ToS
 * @link https://www.myvariety.net MyVariety LLC
 */
class WispApi
{
    /**
     * @var string The API URL
     */
    private $apiUrl;
    /**
     * @var string The Wisp API key
     */
    private $apiKey;
    /**
     * @var bool Whether to connect using ssl
     */
    private $useSsl;

    /**
     * Initializes the request parameter
     *
     * @param string $apiKey The API key
     * @param string $baseUrl The base URL of the pterodactyl panel
     * @param bool $useSsl Whether to connect using ssl (optional)
     */
    public function __construct($apiKey, $baseUrl, $useSsl = true)
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = trim($baseUrl, '/') . '/api';
        $this->useSsl = $useSsl;
    }

    /**
     * Gets a requestor object
     *
     * @param string $className The name of the Requestor class to get
     * @return type
     */
    public function __get($className)
    {
        $r = new \ReflectionClass('\\MyVariety\\WispSDK\\Requestors\\' . $className);
        $this->{$className} = $r->newInstanceArgs([$this->apiKey, $this->apiUrl, $this->useSsl]);
        return $this->{$className};
    }
}
