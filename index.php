<?php
require_once 'Reservering.php';
require_once 'ReserveringDAO.php';

$reserveringDAO = new ReserveringDAO();

// Reservering aanmaken
if (isset($_POST['submit'])) {
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $telefoon = $_POST['telefoon'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $kamer_type = $_POST['kamer_type'];
    $aantal_personen = $_POST['aantal_personen'];
    $reservering = new Reservering(null, $naam, $email, $telefoon, $check_in, $check_out, $kamer_type, $aantal_personen);
    $reserveringDAO->create($reservering);
    header('Location: index.php');
    exit();
}

// Reserveringen lezen
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reservering = $reserveringDAO->read($id);
}

// Reservering updaten
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $telefoon = $_POST['telefoon'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $kamer_type = $_POST['kamer_type'];
    $aantal_personen = $_POST['aantal_personen'];
    $reservering = new Reservering($id, $naam, $email, $telefoon, $check_in, $check_out, $kamer_type, $aantal_personen);
    $reserveringDAO->update($reservering);
    header('Location: index.php');
    exit();
}

// Reservering verwijderen
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $reserveringDAO->delete($id);
    header('Location: index.php');
    exit();
}

// Lijst met alle reserveringen
$reserveringen = $reserveringDAO->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Reserveringssysteem</title>
</head>
<body>
<h1>Hotel Reserveringssysteem</h1>

<!-- Formulier reserveren -->
<h2>Reserveer een kamer</h2>
<form method="post" action="index.php">
    <label>Naam:</label><br>
    <input type="text" name="naam" required><br>
    <label>E-mail:</label><br>
    <input type="email" name="email" required><br>
    <label>Telefoon:</label><br>
    <input type="tel" name="telefoon" required><br>
    <label>Check-in datum:</label><br>
    <input type="date" name="check_in" required><br>
    <label>Check-out datum:</label><br>
    <input type="date" name="check_out" required><br>
    <label>Kamertype:</label><br>
    <select name="kamer_type" required>
        <option value="">-- Selecteer kamertype --</option>
        <option value="Standaard">Standaard</option>
        <option value="Deluxe">Deluxe</option>
        <option value="Superior">Superior</option>
    </select><br>
    <label>Aantal personen:</label><br>
    <input type="number" name="aantal_personen" min="1" max="4" required><br>
    <br>
    <input type="submit" name="submit" value="Reserveer">
</form>

<!-- Lijst met reserveringen -->
<h3>Reserveringen</h3>
<table>
    <thead>
    <tr>
        <th>Naam</th>
        <th>E-mail</th>
        <th>Telefoon</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Kamer type</th>
        <th>Aantal personen</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($reserveringen as $reservering): ?>
        <tr>
            <td><?= $reservering->getNaam() ?></td>
            <td><?= $reservering->getEmail() ?></td>
            <td><?= $reservering->getTelefoon() ?></td>
            <td><?= $reservering->getCheckIn() ?></td>
            <td><?= $reservering->getCheckOut() ?></td>
            <td><?= $reservering->getKamerType() ?></td>
            <td><?= $reservering->getAantalPersonen() ?></td>
            <td>
                <form method="get" action="edit.php">
                    <input type="hidden" name="id" value="<?= $reservering->getId() ?>">
                    <input type="submit" name="edit" value="Bewerk">
                </form>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $reservering->getId() ?>">
                    <input type="submit" name="delete" value="Verwijder">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<!-- Formulier reservering updaten -->
<h2>Update een reservering</h2>
<form action="edit.php" method="post">
    <label for="id">ID:</label>
    <input type="text" name="id"><br><br>

    <label for="naam">Naam:</label>
    <input type="text" name="naam"><br><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email"><br><br>

    <label for="telefoon">Telefoon:</label>
    <input type="text" name="telefoon"><br><br>

    <label for="check_in">Check-in datum:</label>
    <input type="date" name="check_in"><br><br>

    <label for="check_out">Check-out datum:</label>
    <input type="date" name="check_out"><br><br>

    <label for="kamer_type">Kamertype:</label>
    <input type="text" name="kamer_type"><br><br>

    <label for="aantal_personen">Aantal personen:</label>
    <input type="number" name="aantal_personen"><br><br>

    <input type="submit" value="Update reservering">
</form>
</body>
</html>
