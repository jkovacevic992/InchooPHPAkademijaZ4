<?php
/**
 * Created by PhpStorm.
 * User: josip
 * Date: 28.01.19.
 * Time: 13:06
 */

class Osoba
{
    protected $ime;
    protected $prezime;
    protected $datumRodenja;
    protected $spol;

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

}