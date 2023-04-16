<?php

class Reservering
{
    private $id;
    private $naam;
    private $email;
    private $telefoon;
    private $check_in;
    private $check_out;
    private $kamer_type;
    private $aantal_personen;

    public function __construct($id, $naam, $email, $telefoon, $check_in, $check_out, $kamer_type, $aantal_personen)
    {
        $this->id = $id;
        $this->naam = $naam;
        $this->email = $email;
        $this->telefoon = $telefoon;
        $this->check_in = $check_in;
        $this->check_out = $check_out;
        $this->kamer_type = $kamer_type;
        $this->aantal_personen = $aantal_personen;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNaam()
    {
        return $this->naam;
    }

    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefoon()
    {
        return $this->telefoon;
    }

    public function setTelefoon($telefoon)
    {
        $this->telefoon = $telefoon;
    }

    public function getCheckIn()
    {
        return $this->check_in;
    }

    public function setCheckIn($check_in)
    {
        $this->check_in = $check_in;
    }

    public function getCheckOut()
    {
        return $this->check_out;
    }

    public function setCheckOut($check_out)
    {
        $this->check_out = $check_out;
    }

    public function getKamerType()
    {
        return $this->kamer_type;
    }

    public function setKamerType($kamer_type)
    {
        $this->kamer_type = $kamer_type;
    }

    public function getAantalPersonen()
    {
        return $this->aantal_personen;
    }

    public function setAantalPersonen($aantal_personen)
    {
        $this->aantal_personen = $aantal_personen;
    }
}

?>
