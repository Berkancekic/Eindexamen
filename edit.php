<?php
$dsn = 'mysql:host=localhost;dbname=berkanpdo';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$id = $_POST['id'];
$naam = $_POST['naam'];
$email = $_POST['email'];
$telefoon = $_POST['telefoon'];
$checkin = $_POST['check_in'];
$checkout = $_POST['check_out'];
$kamertype = $_POST['kamer_type'];
$aantalpersonen = $_POST['aantal_personen'];

$sql = "UPDATE reserveringen SET naam = :naam, email = :email, telefoon = :telefoon, check_in = :check_in, check_out = :check_out, kamer_type = :kamer_type, aantal_personen = :aantal_personen WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':naam', $naam);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefoon', $telefoon);
$stmt->bindParam(':check_in', $checkin);
$stmt->bindParam(':check_out', $checkout);
$stmt->bindParam(':kamer_type', $kamertype);
$stmt->bindParam(':aantal_personen', $aantalpersonen);
$stmt->bindParam(':id', $id);
$stmt->execute();
?>

<button onclick="history.back()">Ga terug naar het overzicht, en reload Index.php!</button>