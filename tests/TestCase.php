<?php

namespace PcbKingdee\Tests;

use PcbKingdee\Application;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;

class TestCase extends BaseTestCase
{
    const KINGDEE_BASE_URI = 'http://localhost';
    const KINGDEE_DB_ID = '';
    const KINGDEE_APP_ID = '';
    const KINGDEE_APP_SECRET = '';

    protected $authUsername = 'a';

    protected function app()
    {
        $config = [
            'base_uri' => self::KINGDEE_BASE_URI,
            'app_id' => self::KINGDEE_APP_ID,
            'app_secret' => self::KINGDEE_APP_SECRET,
            'db_id' => self::KINGDEE_DB_ID,
        ];

        $cache = new Psr16Cache(new FilesystemAdapter());

        return new Application($config, $cache);
    }
}
