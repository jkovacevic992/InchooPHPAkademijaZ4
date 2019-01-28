<?php
require 'Zaposlenik.php';

$zaposleniciArray = [];
$bool = true;

while ($bool) {

    ispisiIzbornik();


    $izbor = trim(fgets(STDIN));


    if ($izbor === 6) {

        break;
    }
    switch ($izbor) {

        case 1:
            {
                ispisiZaposlenike($zaposleniciArray);

                echo "Želite li se vratiti na izbornik? (DA/NE)\n";
                if (strtolower(trim(fgets(STDIN))) !== 'da') {
                    $bool = false;
                }
                break;

            }
        case 2:
            {
                echo "Upišite sve potrebne podatke: \n";
                $zaposleniciArray[] = unosZaposlenika($zaposleniciArray);

                break;
            }
        case 3:
            {
                echo "Upišite ID zaposlenika čije podatke želite mijenjati\n";
                $temp = readline();

                $zaposleniciArray = promjenaZaposlenika($zaposleniciArray, $temp);

                break;
            }
        case 4:
            {
                echo "Upišite ID zaposlenika kojeg želite obrisati: \n";
                $temp = readline();
                echo "Jeste li sigurni da želite obrisati polaznika s ID-em $temp? (DA/NE)\n";

                if (readline() !== 'da') {
                    echo "Zaposlenik nije obrisan.\n";
                } else {
                    $zaposleniciArray = brisanjeZaposlenika($zaposleniciArray, $temp);
                }

                break;
            }
        case 5:
            {
                ispisiIzbornikStatistike();
                ispisiStatistiku(readline(), $zaposleniciArray);
                break;
            }
        case 6:
            {
                exit();
            }
        default:
            {
                echo "\n\nNiste odabrali ništa\n\n";
            }
    }


}

function ispisiIzbornik()
{

    echo "*************************************************\n";
    echo "1. Pregled Zaposlenika\n";
    echo "2. Unos novog Zaposlenika \n";
    echo "3. Promjena podataka postojećem Zaposleniku\n";
    echo "4. Brisanje Zaposlenika\n";
    echo "5. Statistika\n";
    echo "6. Izlaz\n";
    echo "Odaberite broj od 1 do 6.\n";
    echo "*************************************************\n";
}

function ispisiZaposlenike($array)
{
    echo "*************************************************\n";
    for ($i = 0; $i < count($array); $i++) {
        echo "ID: " . $array[$i]->getId() . "\n";
        echo "IME: " . $array[$i]->getIme() . "\n";
        echo "PREZIME: " . $array[$i]->getPrezime() . "\n";
        echo "DATUM ROĐENJA: " . $array[$i]->getDatumRodenja() . "\n";
        echo "SPOL: " . $array[$i]->getSpol() . "\n";
        echo "MJESEČNA PRIMANJA: " . $array[$i]->getMjesecnaPrimanja() . "\n";
        echo "*************************************************\n";
    }
}

function unosZaposlenika($array = null)
{

    echo "ID: ";
    $id = kontrolaId(readline(), $array);
    echo "Ime: ";
    $ime = kontrolaImenaIPrezimena(readline());
    echo "Prezime: ";
    $prezime = kontrolaImenaIPrezimena(readline());
    echo "Datum rođenja (dd.mm.yyyy): ";
    $datumRodenja = kontrolaDatum(readline());
    echo "Spol: ";
    $spol = kontrolaSpol(readline());
    echo "Mjesečna primanja: ";
    $mjesecnaPrimanja = kontrolaMjesecnoPrimanje(readline());

    return new Zaposlenik($id, $ime, $prezime, $datumRodenja, $spol, $mjesecnaPrimanja);


}


function brisanjeZaposlenika($array, $zaposlenikId)
{
    for ($i = 0; $i <= count($array); $i++) {

        if (isset($array[$i]) && $array[$i]->getId() === $zaposlenikId) {
            $array[$i] = null;
            unset($array[$i]);

        }
    }
    $array = array_values($array);
    return $array;
}

function promjenaZaposlenika($array, $zaposlenikId)
{

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]->getId() === $zaposlenikId) {

            echo "Koji podatak želite promijeniti (1-6)?\n";
            echo "1. ID\n";
            echo "2. IME\n";
            echo "3. PREZIME\n";
            echo "4. DATUM ROĐENJA\n";
            echo "5. SPOL\n";
            echo "6. MJESEČNA PRIMANJA\n";
            switch (readline()) {
                case 1:
                    {
                        echo "Stara vrijednost ID-a je " . $array[$i]->getId() . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->setId(kontrolaId(readline(), $array));
                        break;
                    }
                case 2:
                    {
                        echo "Staro ime je " . $array[$i]->getIme() . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->setIme(kontrolaImenaIPrezimena(readline()));
                        break;
                    }
                case 3:
                    {
                        echo "Staro prezime je " . $array[$i]->getPrezime() . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->setPrezime(kontrolaImenaIPrezimena(readline()));
                        break;
                    }
                case 4:
                    {
                        echo "Stari datum rođenja je " . $array[$i]->getDatumRodenja() . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->setDatumRodenja(kontrolaDatum(readline()));
                        break;

                    }
                case 5:
                    {
                        echo "Stari spol je " . $array[$i]->getSpol() . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->setSpol(kontrolaSpol(readline()));
                        break;
                    }
                case 6:
                    {
                        echo "Stari iznos mjesečnih primanja je  " . $array[$i]->getMjesecnaPrimanja() . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->setMjesecnaPrimanja(kontrolaMjesecnoPrimanje(readline()));
                        break;
                    }
            }
        }
    }
    return $array;
}


function kontrolaImenaIPrezimena($var)
{
    if ($var === "" || preg_match('~[0-9]+~', $var)) {
        echo "Ime/prezime ne može biti prazno i sadržavati brojeve.\nUnesite novo ime/prezime:\n";

        return kontrolaImenaIPrezimena(readline());
    } else {
        return $var;
    }


}

function kontrolaId($var, $array)
{
    if ($var === "") {
        echo "Morate unijeti ID.\nUnesite novi ID:\n";
        return kontrolaId(readline(), $array);
    }
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]->getId() === $var) {
            echo "Zaposlenik s istim ID-em već postoji.\nUnesite novi ID:\n";
            return kontrolaId(readline(), $array);

        }
    }
    return $var;
}

function kontrolaMjesecnoPrimanje($var)
{
    var_dump($var);
    $var = floatval(str_replace(",", ".", $var));
    var_dump($var);
    if ($var === "" || !is_float($var) || $var <= 0) {
        echo "Mjesečno primanje mora biti decimalan broj veći od 0.\nUnesite novu vrijednost:\n";

        return kontrolaMjesecnoPrimanje(readline());
    } else {
        return number_format($var, 2, '.', '');
    }
}

function kontrolaDatum($var)
{
    $var = str_replace(["-", "/", "'\'"], ".", $var);
    $format = "d.m.Y";
    $d = DateTime::createFromFormat($format, $var);

    if ($var === "" || preg_match("/^[a-zA-Z]+$/", $var) || $d->format($format) !== $var) {
        echo "Morate upisati datum formata dd.mm.yyyy.\nUnesite novu vrijednost:\n";

        return kontrolaDatum(readline());
    } else {

        return $var;
    }

}

function kontrolaSpol($var)
{

    if ($var === "" || ($var !== "muški" && $var !== "ženski")) {
        echo "Spol može biti muški ili ženski.\nUnesite novu vrijednost:\n";

        return kontrolaSpol(readline());
    } else {

        return $var;
    }
}

function ispisiIzbornikStatistike()
{
    echo "*************************************************\n";
    echo "1. Ukupna starost\n";
    echo "2. Prosječna starost \n";
    echo "3. Ukupna primanja\n";
    echo "4. Prosječna primanja\n";
    echo "Odaberite broj od 1 do 4.\n";
    echo "*************************************************\n";


}

function ispisiStatistiku($var, $array = null)
{
    switch ($var) {
        case 1:
            {
                break;
            }
        case 2:
            {
                prosjecnaStarost($array);
                break;
            }
        case 3:
            {
                break;
            }
        case 4:
            {
                break;
            }
        default:
            {
                echo "\n\nNiste odabrali ništa\n\n";
            }


    }
}

function prosjecnaStarost($array)
{
    $age = 0;
    try {
        $do = new DateTime();
        for ($i = 0; $i < count($array); $i++) {
            $od = new DateTime($array[$i]->getDatumRodenja());
            $difference = $do->diff($od);
            $age += $difference->y;

        }
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }

    $age /= count($array);
    echo "Prosječna starost svih zaposlenika je " . $age . " god.\n";

}

