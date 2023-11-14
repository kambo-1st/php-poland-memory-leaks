<?php
function get_data(string $file_path) : array {
    $file = fopen($file_path, 'r');
    $lines = [];
    while (($line = fgets($file)) !== false) {
        $lines[] = trim($line);
    }

    return $lines;
}

$lines = get_data('heap.txt');
foreach ($lines as $line_number => $line) {
    if ($line === 'needle') {
        echo 'found at line: '.$line_number."\n";
        break;
    }
}

meminfo_dump(fopen('memory.json', 'w'));

