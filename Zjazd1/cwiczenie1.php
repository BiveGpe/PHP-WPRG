<?php

declare(strict_types=1);

/*
 *  1. Stwórz tablicę zawierającą nazwy kilku owoców (np. "jabłko", "banan", "pomarańcza").
 * Napisz pętlę, która wyświetli każdy owoc w osobnej linii, pisany od tyłu (nie używaj żadnej funkcji wbudowanej)
 * oraz informację, czy dany owoc zaczyna się literą "p".
 */

$fruits = ["jablko", "banan", "pomarancza"];

foreach ($fruits as $fruit) {
    $reversedFruit = "";
    for ($i = strlen($fruit) - 1; $i >= 0; $i--) {
        $reversedFruit .= $fruit[$i];
    }
    echo $reversedFruit;
    if ($fruit[0] === "p") {
        echo " zaczyna się od litery 'p'";
    }

    echo "\n";
}
