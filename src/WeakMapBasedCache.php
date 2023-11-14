<?php declare(strict_types=1);

namespace Kambo\MemoryLeaks;

use WeakMap;
use LogicException;

class WeakMapBasedCache implements Cache
{
    private \WeakMap $cache;

    public function __construct() {
        $this->cache = new WeakMap();
    }

    public function set(object $key, mixed $data) : void {
        $this->cache[$key] = $data;
    }

    public function has(object $key) : bool {
        return isset($this->cache[$key]);
    }

    public function get(object $key) : mixed {
        if ($this->has($key) === false) {
            throw new LogicException("Value ".$key. " does not exists.");
        }

        return $this->cache[ $key ];
    }
}
