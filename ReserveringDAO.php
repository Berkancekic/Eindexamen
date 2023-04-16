<?php
require_once 'Reservering.php';

class ReserveringDAO
{

    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO ("mysql:host=localhost;dbname=berkanpdo", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'connection failed: ' . $e->getMessage();
        }
    }

    public function read($id, $pdo)
    {
        $stmt = $pdo->prepare("INSERT INTO myTable (name, age) VALUES (?, ?)");
        $stmt->execute([$_POST['name'], 29]);
        echo $this->pdo->lastInsertId();
        $stmt = null;
    }

    public function create($reservering)
    {
        $sql = "INSERT INTO reserveringen (naam, email, telefoon, check_in, check_out, kamer_type, aantal_personen) VALUES (:naam, :email, :telefoon, :check_in, :check_out, :kamer_type, :aantal_personen)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':naam' => $reservering->getNaam(),
            ':email' => $reservering->getEmail(),
            ':telefoon' => $reservering->getTelefoon(),
            ':check_in' => $reservering->getCheckIn(),
            ':check_out' => $reservering->getCheckOut(),
            ':kamer_type' => $reservering->getKamerType(),
            ':aantal_personen' => $reservering->getAantalPersonen()
        ]);
    }
//
//    public function read($id)
//    {
//        $sql = "SELECT * FROM reserveringen WHERE id = :id";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->execute([':id' => $id]);
//        $row = $stmt->fetch();
//        $reservering = new Reservering($row['id'], $row['naam'], $row['email'], $row['telefoon'], $row['check_in'], $row['check_out'], $row['kamer_type'], $row['aantal_personen']);
//        return $reservering;
//    }

//    public function update($reservering)
//    {
//        $sql = "UPDATE reserveringen SET naam = :naam, email = :email, telefoon = :telefoon, check_in = :check_in, check_out = :check_out, kamer_type = :kamer_type, aantal_personen = :aantal_personen WHERE id = :id";
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->execute([
//            ':id' => $reservering->getId(),
//            ':naam' => $reservering->getNaam(),
//            ':email' => $reservering->getEmail(),
//            ':telefoon' => $reservering->getTelefoon(),
//            ':check_in' => $reservering->getCheckIn(),
//            ':check_out' => $reservering->getCheckOut(),
//            ':kamer_type' => $reservering->getKamerType(),
//            ':aantal_personen' => $reservering->getAantalPersonen()
//        ]);
//    }

    public function delete($id)
    {
        $sql = "DELETE FROM reserveringen WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function readAll()
    {
        $sql = "SELECT * FROM reserveringen";
        $stmt = $this->pdo->query($sql);
        $rows = $stmt->fetchAll();
        $reserveringen = [];
        foreach ($rows as $row) {
            $reservering = new Reservering($row['id'], $row['naam'], $row['email'], $row['telefoon'], $row['check_in'], $row['check_out'], $row['kamer_type'], $row['aantal_personen']);
            array_push($reserveringen, $reservering);
        }
        return $reserveringen;
    }
}

?>
