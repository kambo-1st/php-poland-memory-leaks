<?php declare(strict_types=1);

namespace Kambo\MemoryLeaks;

class UserService
{
    private \SQLite3 $sqlite;
    private Cache    $cache;

    public function __construct(?Cache $cache=null) {
        $this->sqlite = new \SQLite3(
            'users-new.sqlite',
            SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE
        );

        if ($cache === null) {
            $this->cache = new ArrayBasedCache();
        }
    }

    public function getUser(UserId $userId) : ?User {
        if ($this->cache->has($userId)) {
            return $this->cache->get($userId);
        }

        // Get user from database
        $stmt = $this->sqlite->prepare('SELECT * FROM "users" WHERE id=:id');
        $stmt->bindValue(':id', $userId->toValue(), SQLITE3_INTEGER);

        $result = $stmt->execute();

        $userData = $result->fetchArray(\SQLITE3_ASSOC);

        if ($userData === false) {
            return null;
        }

        $user = User::fromArray($userData);

        $this->cache->set($userId, $user);

        return $user;
    }
}
