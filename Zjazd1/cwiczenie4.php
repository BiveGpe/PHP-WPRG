<?php

declare(strict_types=1);

/*
 * 4. Stwórz z tekstu tablicę (używając explode)
 * Z utworzonej tablicy usuń wszystkie elementy ze znakami interpunkcyjnymi,
 * używając pętli. Przeiteruj się przez każdy element tabeli, sprawdź,
 * czy ten element jest znakiem interpunkcyjnym,  jeśli jest,
 * to usuń go przez przesunięcie każdego następnego elementu o jeden do tyłu,
 * nie używaj regexu, ale użyj pętli for i instrukcji if.
 * Na podstawie otrzymanej tablicy utwórz tablicę asocjacyjną przy pomocy pętli foreach,
 * gdzie kolejne elementy parzyste będą kluczami, a elementy po nich następujące wartościami.
 * Każdą parę wypisz w oddzielnej linii.
 */

$text = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
$words = explode(" ", $text);

for ($i = 0; $i < count($words); $i++) {
    $lastChar = substr($words[$i], -1);
    if ($lastChar == "." || $lastChar == ",") {
        for ($j = $i; $j < count($words) - 1; $j++) {
            $words[$j] = $words[$j + 1];
        }
        array_pop($words);
        $i--; // Decrement index to check the shifted word
    }
}

$assocArray = [];
for ($i = 0; $i < count($words); $i += 2) {
    $assocArray[$words[$i]] = $words[$i + 1] ?? null; // Use null if there is no next word
}

foreach ($assocArray as $key => $value) {
    echo $key . " => " . $value . "\n";
}
