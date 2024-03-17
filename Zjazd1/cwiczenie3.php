<?php

declare(strict_types=1);

/*
 * 3. Dla zadanego N napisz program wyliczający N-tą liczbę Fibonacciego.
 *  Ciąg powinien zostać zapisany w tablicy, a następnie program wypisze nieparzyste elementy tablicy.
 *  Każdy element powinien być w nowej linii, a linie powinny być ponumerowane.
 */

$N = 10;
$fibonacci = [0, 1];

for ($i = 2; $i < $N; $i++) {
    $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
}

foreach ($fibonacci as $key => $value) {
    if ($value % 2 !== 0) {
        echo ($key + 1) . ". " . $value . "\n";
    }
}


