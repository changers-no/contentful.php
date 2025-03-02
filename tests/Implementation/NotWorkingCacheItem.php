<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2023 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

namespace Contentful\Tests\Delivery\Implementation;

use Psr\Cache\CacheItemInterface;

class NotWorkingCacheItem implements CacheItemInterface
{
    /**
     * @var string
     */
    private $key;

    /**
     * NotWorkingCacheItem constructor.
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * {@inheritdoc}
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function get(): ?self
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function isHit(): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function set(mixed $value): static
    {
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function expiresAt(?\DateTimeInterface $expiration): static
    {
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function expiresAfter(\DateInterval|int|null $time): static
    {
        return $this;
    }
}
