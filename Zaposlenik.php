<?php


class Zaposlenik
{
    public $id;
    public $ime;
    public $prezime;
    public $datumRodenja;
    public $spol;
    public $mjesecnaPrimanja;


    function __construct($id,$ime,$prezime, $datumRodenja, $spol, $mjesecnaPrimanja) {
        $this->setId($id);
        $this->setIme($ime);
        $this->setPrezime($prezime);
        $this->setDatumRodenja($datumRodenja);
        $this->setSpol($spol);
        $this->setMjesecnaPrimanja($mjesecnaPrimanja);



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

    /**
     * @return mixed
     */
    public function getIme()
    {
        return $this->ime;
    }

    /**
     * @param mixed $ime
     */
    public function setIme($ime)
    {

            $this->ime = $ime;


    }

    /**
     * @return mixed
     */
    public function getPrezime()
    {
        return $this->prezime;
    }

    /**
     * @param mixed $prezime
     */
    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    }

    /**
     * @return mixed
     */
    public function getDatumRodenja()
    {
        return $this->datumRodenja;
    }

    /**
     * @param mixed $datumRodenja
     */
    public function setDatumRodenja($datumRodenja)
    {
        $this->datumRodenja = $datumRodenja;
    }

    /**
     * @return mixed
     */
    public function getSpol()
    {
        return $this->spol;
    }

    /**
     * @param mixed $spol
     */
    public function setSpol($spol)
    {
        $this->spol = $spol;
    }

    /**
     * @return mixed
     */
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