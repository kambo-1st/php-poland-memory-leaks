<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

use \Kambo\MemoryLeaks\{UserId,UserService};

$userService = new UserService();

for ($i = 1; $i <= 1000000; $i++) {
    $result = $userService->getUser(new UserId($i));
    echo $result."\n";
}

