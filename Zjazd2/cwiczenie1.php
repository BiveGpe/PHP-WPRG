<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
</head>
<body>

<form method="post">
    <input type="number" id="number1" placeholder="Number 1">
    <select name="calc" id="calc">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="number" id="number2" placeholder="Number 2">
    <button type="submit">Oblicz</button>
</form>

<?php
if($_POST){
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $result = 0;

    switch ($_POST['calc']):
        case "+":
            $result = $number1 + $number2;
            break;
        case "-":
            $result = $number1 - $number2;
            break;
        case "*":
            $result = $number1 * $number2;
            break;
        case "/":
            if($number2 == 0){
                $result = "<p>Nie dziel przez 0!</p>";
            }
            else {
                $result = $number1 / $number2;
            }
            break;
    endswitch;

    echo "<p>Wynik: $result</p>";
}
?>
</body>
</html>
