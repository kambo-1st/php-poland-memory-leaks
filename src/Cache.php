<?php declare(strict_types=1);

namespace Kambo\MemoryLeaks;

/**
 * Cache
 */
interface Cache
{
    public function set(object $key, mixed $data) : void;

    public function has(object $key) : bool;

    public function get(object $key) : mixed;
}
