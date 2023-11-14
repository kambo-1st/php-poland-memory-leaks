<?php

  function search(string $file_path, string $needle) : ?int {
     $file = fopen($file_path, 'r');
     $lineNumber = 1;
     while (($line = fgets($file)) !== false) {
         if (trim($line) === $needle) {
             fclose($file);
             return $lineNumber;
         }
         
         $lineNumber++;
     }
     
     fclose($file);
     return null;
  }
  
  if (($line_number = search('heap.txt', 'needle')) !== null) {
     echo 'found at line: '.$line_number."\n";
  }

