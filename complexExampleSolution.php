<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

use \Kambo\MemoryLeaks\{UserId,UserService,WeakMapBasedCache};

$userService = new UserService(new WeakMapBasedCache());

for ($i = 1; $i <= 1000000; $i++) {
    $result = $userService->getUser(new UserId($i));
    echo $result."\n";
}

