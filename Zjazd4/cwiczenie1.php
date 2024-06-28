<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rezerwacja</title>
</head>
<body style="text-align: center">
<?php
session_start();

$login = 'admin';
$password = 'password';

if (isset($_POST['login']) && isset($_POST['password'])) {
    if ($_POST['login'] === $login && $_POST['password'] === $password) {
        $_SESSION['user'] = $login;
        setcookie('user', $login, time() + 3600);
    }
}

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    setcookie('user', '', time() - 3600);
}

if (isset($_POST['clear'])) {
    setcookie('form', '', time() - 3600);
}

if (isset($_POST['submit'])) {
    $form_data = serialize($_POST);
    setcookie('form', $form_data, time() + 3600);
}

$form_data = isset($_COOKIE['form']) ? unserialize($_COOKIE['form']) : [];

if (isset($_SESSION['user'])) {
    echo "Witaj, " . $_COOKIE['user'] . "!<br>";
?>

<form method="post" action="">
    <label for="ilosc">Ilość ludzi: </label>
    <br>
    <select name="ilosc" id="ilosc">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <br>
    <button type="submit">Potwierdz ilośc osób</button><br><br>
</form>
<form method="post" action="">
    <button type="submit" name="logout">Wyloguj</button>
</form>

<form method="post" action="">
    <?php
    if (isset($_POST['ilosc'])) {
        $iloscOsob = intval($_POST['ilosc']);
        echo "<input type='hidden' name='ilosc' value='$iloscOsob'>";
        for ($i = 1; $i <= $iloscOsob; $i++) {
            echo "<p>Osoba $i:</p>";
            echo "<input type='text' name='imie$i' placeholder='Imię osoby $i'><br>";
            echo "<input type='text' name='nazwisko$i' placeholder='Nazwisko osoby $i'><br>";
            echo "<input type='text' name='adres$i' placeholder='Adres osoby $i'><br>";
            echo "<br>";
        }

        echo "<input type='number' name='blik' id='blik' maxlength='6' placeholder='Blik' pattern='[0-9]{6}'><br>";
        echo "<label for='data przyjazdu'>Data przyjazdu:</label><br>";
        echo "<input type='date' name='dataPrzyjazdu' id='data przyjazdu'><br>";
        echo "<label for='dataWyjazdu'>Data wyjazdu:</label><br>";
        echo "<input type='date' name='dataWyjazdu' id='data wyjazdu'><br>";
        echo "<input type='checkbox' id='popielniczka' name='popielniczka'>";
        echo "<label for='popielniczka'>Popielniczka: </label><br>";
        echo "<input type='checkbox' id='klimatyzacja' name='klimatyzacja'>";
        echo "<label for='klimatyzacja'>Klimatyzacja: </label><br>";
        echo "<input type='checkbox' id='lozko' name='lozko'>";
        echo "<label for='lozko'>Łóżko dla dziecka</label><br><br>";
        echo "<button type='submit'>Zarezerwuj</button><br>";
    }
    ?>
</form>
<div class="book">
    <?php
    if (isset($_POST['ilosc'])
        && isset($_POST['blik'])
        && isset($_POST['dataPrzyjazdu'])
        && isset($_POST['dataWyjazdu'])
    ) {
        $ilosc = $_POST['ilosc'];
        $blik = $_POST['blik'];
        $dataPrzyjazdu = $_POST['dataPrzyjazdu'];
        $dataWyjazdu = $_POST['dataWyjazdu'];
        $popielniczka = isset($_POST['popielniczka']) ? 'Tak' : 'Nie';
        $klimatyzacja = isset($_POST['klimatyzacja']) ? 'Tak' : 'Nie';
        $lozko = isset($_POST['lozko']) ? 'Tak' : 'Nie';

        for ($i = 1; $i <= $ilosc; $i++) {
            $imie = $_POST["imie$i"];
            $nazwisko = $_POST["nazwisko$i"];
            $adres = $_POST["adres$i"];

            echo "<p>Osoba $i:</p>";
            echo "<p>Imie: $imie</p>";
            echo "<p>Nazwisko: $nazwisko</p>";
            echo "<p>Adres: $adres</p>";
        }

        echo "<p>Transakcja blik zatwierdzona</p>";
        echo "<p>Data przyjazdu: $dataPrzyjazdu</p>";
        echo "<p>Data wyjazdu: $dataWyjazdu</p>";
        echo "<p>Czy popielniczka: $popielniczka</p>";
        echo "<p>Czy klimatyzacja: $klimatyzacja</p>";
        echo "<p>Czy łóżko dla dziecka: $lozko</p>";
    }
    ?>
</div>
<?php
} else {
    echo "Nie masz dostępu do tej części strony. Zaloguj się, aby uzyskać dostęp.<br>";
    ?>
<form method="post" action="">
    <label for="login">Login: </label>
    <br>
    <input type="text" name="login" id="login">
    <br>
    <label for="password">Hasło: </label>
    <br>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit">Zaloguj</button>
</form>
<?php
}
?>
</body>
</html>
