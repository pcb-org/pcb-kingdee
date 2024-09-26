<?php

namespace PcbKingdee;

use GuzzleHttp\Client as HttpClient;
use PcbKingdee\Exceptions\BadMethodCallException;
use PcbKingdee\Exceptions\InvalidArgumentException;

/**
 * @method \PcbKingdee\Models\DeliveryNotice makeDeliveryNotice()
 * @method \PcbKingdee\Models\Inventory      makeInventory()
 * @method \PcbKingdee\Models\MfgOrder       makeMfgOrder()
 * @method \PcbKingdee\Models\Miscellaneous  makeMiscellaneous()
 * @method \PcbKingdee\Models\MisDelivery    makeMisDelivery()
 * @method \PcbKingdee\Models\PickMtrl       makePickMtrl()
 * @method \PcbKingdee\Models\PPBom          makePPBom()
 * @method \PcbKingdee\Models\ReturnMtrl     makeReturnMtrl()
 * @method \PcbKingdee\Models\SalesOrder     makeSalesOrder()
 * @method \PcbKingdee\Models\TransferDirect makeTransferDirect()
 * @method \PcbKingdee\Models\User           makeUser()
 * @method $this                             withUser(string $username)
 */
class Application
{
    /**
     * @var \PcbKingdee\Client
     */
    protected $client;

    /**
     * @param array $config
     * @param \Psr\SimpleCache\CacheInterface $cache
     */
    public function __construct($config, $cache)
    {
        $http = new HttpClient();

        $this->client = new Client($config, $cache, $http);
    }

    /**
     * @param string $username
     * @return $this
     */
    public function withUser($username)
    {
        $this->client->startSession($username);

        return $this;
    }

    /**
     * @param string $class
     * @param array $args
     * @return mixed
     * @throws \PcbKingdee\Exceptions\InvalidArgumentException
     */
    protected function makeModel($class, $args)
    {
        $fullClass = "\\PcbKingdee\\Models\\{$class}";

        if (!class_exists($fullClass)) {
            throw new InvalidArgumentException("Class {$fullClass} does not exist");
        }

        $instance = new $fullClass($args);

        $instance->setClient($this->client);

        return $instance;
    }

    /**
     * @param string $method
     * @param array $args
     * @return mixed
     * @throws \PcbKingdee\Exceptions\BadMethodCallException
     */
    public function __call($method, $args)
    {
        if (strpos($method, 'make') === 0) {
            $model = substr($method, 4);

            return $this->makeModel($model, $args);
        }

        throw new BadMethodCallException("Method {$method} does not exist");
    }
}
