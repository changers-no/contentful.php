<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2018 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\Tests\Delivery\Implementation;

use Cache\Adapter\PHPArray\ArrayCachePool;
use Contentful\Delivery\Cache\CacheItemPoolFactoryInterface;
use Psr\Cache\CacheItemPoolInterface;

class CacheItemPoolFactory implements CacheItemPoolFactoryInterface
{
    /**
     * @var ArrayCachePool[]
     */
    public static $pools = [];

    public function __construct()
    {
        self::$pools = [];
    }

    public function getCacheItemPool(string $api, string $spaceId, string $environmentId): CacheItemPoolInterface
    {
        $key = $api.'.'.$spaceId.'.'.$environmentId;
        if (!isset(self::$pools[$key])) {
            self::$pools[$key] = new ArrayCachePool();
        }

        return self::$pools[$key];
    }
}
