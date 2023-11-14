<?php declare(strict_types=1);

namespace Kambo\MemoryLeaks;

use LogicException;

class ArrayBasedCache implements Cache
{
    private array $cache = [];

    public function set(object $key, mixed $data) : void {
        $this->cache[(string)$key] = $data;
    }

    public function has(object $key) : bool {
        return isset($this->cache[(string)$key]);
    }

    public function get(object $key) : mixed {
        if ($this->has((string)$key) === false) {
            throw new LogicException("Value ".$key. " does not exists.");
        }

        return $this->cache[(string)$key];
    }

    public function clear() : void {
        $this->cache = [];
    }
}
