<?php declare(strict_types=1);

namespace Kambo\MemoryLeaks;

class User
{
    private string $userName;
    private string $name;
    private string $surname;

    public function __construct($userName, $name, $surname) {
        $this->userName = $userName;
        $this->name     = $name;
        $this->surname  = $surname;
    }

    public static function fromArray(array $data) : self {
        return new self($data['username'], $data['name'], $data['surname']);
    }

    public function __toString() : string{
        return $this->name. ' ' . $this->surname;
    }
}
