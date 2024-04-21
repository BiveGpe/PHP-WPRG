<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sprawdź liczbę pierwszą</title>
</head>
<body>
<form method="post">
    <input type="number" name="number" placeholder="Wpisz liczbę">
    <button type="submit">Sprawdź</button>
</form>

<?php
function isPrime($number) {
    $iterations = 0;
    for ($i = 2; $i * $i <= $number; $i++) {
        $iterations++;
        if ($number % $i == 0) {
            return array(false, $iterations);
        }
    }
    return array(true, $iterations);
}

if ($_POST) {
    $number = $_POST['number'];
    // Sprawdź, czy wprowadzona wartość jest dodatnią liczbą całkowitą
    if (is_numeric($number) && $number > 0 && $number == round($number)) {
        list($isPrime, $iterations) = isPrime($number);
        // Wyświetl wynik
        if ($isPrime) {
            echo "<p>$number jest liczbą pierwszą.</p>";
        } else {
            echo "<p>$number nie jest liczbą pierwszą.</p>";
        }
        // Wyświetl liczbę iteracji
        echo "<p>Liczba iteracji: $iterations</p>";
    } else {
        echo "<p>Proszę wprowadzić dodatnią liczbę całkowitą.</p>";
    }
}
?>
</body>
</html>
