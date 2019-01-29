<?php
require 'Osoba.php';

class Zaposlenik extends Osoba
{
    private $id;
    private $mjesecnaPrimanja;


    function __construct($id, $ime, $prezime, $datumRodenja, $spol, $mjesecnaPrimanja)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->datumRodenja = $datumRodenja;
        $this->spol = $spol;
        $this->mjesecnaPrimanja = $mjesecnaPrimanja;


    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getMjesecnaPrimanja()
    {
        return $this->mjesecnaPrimanja;
    }

    /**
     * @param mixed $mjesecnaPrimanja
     */
    public function setMjesecnaPrimanja($mjesecnaPrimanja)
    {
        $this->mjesecnaPrimanja = $mjesecnaPrimanja;
    }


}