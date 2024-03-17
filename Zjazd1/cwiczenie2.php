<?php

declare(strict_types=1);

/*
 * 2. Napisz program, który wypisze na ekranie wszystkie liczby pierwsze z zadanego zakresu
 */

$rangeStart = 1;
$rangeEnd = 100;

for ($i = $rangeStart; $i <= $rangeEnd; $i++) {
    if ($i === 1) {
        continue;
    }
    $isPrime = true;
    for ($j = 2; $j < $i; $j++) {
        if ($i % $j === 0) {
            $isPrime = false;
            break;
        }
    }
    if ($isPrime) {
        echo $i . "\n";
    }
}
