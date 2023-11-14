<?php
function get_data(string $file_path) : array {
    echo sprintf("Fce enter: %dKB\n", memory_get_usage()/1024);
    $file = fopen($file_path, 'r');
    $lines = [];
    while (($line = fgets($file)) !== false) {
        echo sprintf("Read line: %dKB\n", memory_get_usage()/1024);
        $lines[] = trim($line);
    }

    return $lines;
}

$lines = get_data('heap.txt');
foreach ($lines as $line_number => $line) {
    if ($line === 'needle') {
        echo 'found at line: '.$line_number."\n";
    }
}

