<?php
// Nawiązanie połączenia z bazą danych
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Wykonanie polecenia SELECT
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Przechodzenie przez wyniki za pomocą mysqli_fetch_row
    while($row = mysqli_fetch_row($result)) {
        echo "id: " . $row[0]. " - Name: " . $row[1]. " " . $row[2]. "<br>";
    }

    // Przechodzenie przez wyniki za pomocą mysqli_fetch_array
    mysqli_data_seek($result, 0); // Resetowanie wskaźnika wyników
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }

    // Wyświetlanie liczby wierszy za pomocą mysqli_num_rows
    echo "Total rows: " . mysqli_num_rows($result);
} else {
    echo "0 results";
}

// Wykonanie polecenia INSERT INTO
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
