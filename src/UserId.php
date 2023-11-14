<?php declare(strict_types=1);

namespace Kambo\MemoryLeaks;

/**
 * User id
 */
class UserId
{
    private int $userId;

    public function __construct(int $userId) {
        $this->userId = $userId;
    }

    public function __toString() : string {
        return (string)$this->userId;
    }

    public function toValue() : int {
        return $this->userId;
    }
}
