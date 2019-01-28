<?php
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

    $var = floatval(str_replace(",", ".", $var));

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

    if (!$d || $var === "" || preg_match("/^[a-zA-Z]+$/", $var) || $d->format($format) !== $var) {
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
                ukupnaStarost($array);
                break;
            }
        case 2:
            {
                prosjecnaStarost($array);
                break;
            }
        case 3:
            {
                ukupnaPrimanja($array);
                break;
            }
        case 4:
            {
                prosjecnaPrimanja($array);
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

function ukupnaStarost($array)
{

    try {
        $age = new DateTime('00.00.0000');
        $do = new DateTime();
        for ($i = 0; $i < count($array); $i++) {
            $od = new DateTime($array[$i]->getDatumRodenja());
            $difference = $do->diff($od);
            //not sure why date_add was going into negative values here. date_sub fixed it!
            date_sub($age, $difference);

        }

        $rezultat = $age->format("y \g\. m \m\j\. d \d.");

        echo "Ukupna starost svih zaposlenika je " . $rezultat . "\n";


    } catch (Exception $exception) {
        echo $exception->getMessage();
    }

}

function ukupnaPrimanja($array)
{
    try {
        $ukupnoDoDvadeset = 0;
        $ukupnoDvadesetTrideset = 0;
        $ukupnoTridesetCetrdeset = 0;
        $ukupnoOdCetrdeset = 0;
        $do = new DateTime();
        for ($i = 0; $i < count($array); $i++) {
            $od = new DateTime($array[$i]->getDatumRodenja());
            $difference = $do->diff($od);
            $age = $difference->y;

            switch ($age) {
                case ($age < 20):
                    {
                        $ukupnoDoDvadeset += $array[$i]->getMjesecnaPrimanja();
                        break;
                    }
                case ($age >= 20 && $age < 30):
                    {

                        $ukupnoDvadesetTrideset += $array[$i]->getMjesecnaPrimanja();

                        break;
                    }
                case ($age >= 30 && $age < 40):
                    {
                        $ukupnoTridesetCetrdeset += $array[$i]->getMjesecnaPrimanja();
                        break;
                    }
                case ($age >= 40):
                    {
                        $ukupnoOdCetrdeset += $array[$i]->getMjesecnaPrimanja();
                        break;
                    }
            }

        }
        echo "Ukupna primanja osoba do 20 godina: " . number_format($ukupnoDoDvadeset, 2, '.', '') . "\n";
        echo "Ukupna primanja osoba između 20 i 30 godina: " . number_format($ukupnoDvadesetTrideset, 2, '.', '') . "\n";
        echo "Ukupna primanja osoba između 30 i 40 godina: " . number_format($ukupnoTridesetCetrdeset, 2, '.', '') . "\n";
        echo "Ukupna primanja osoba iznad 40 godina: " . number_format($ukupnoOdCetrdeset, 2, '.', '') . "\n";
    } catch (Exception $exception) {
        $exception->getMessage();
    }

}

function prosjecnaPrimanja($array)
{
    $ukupnaPrimanjaMuskih = 0;
    $ukupnaPrimanjaZenskih = 0;
    $brojMuskih = 0;
    $brojZenskih = 0;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]->getSpol() === "muški") {
            $brojMuskih++;
            $ukupnaPrimanjaMuskih += $array[$i]->getMjesecnaPrimanja();
        } else {
            $brojZenskih++;
            $ukupnaPrimanjaZenskih += $array[$i]->getMjesecnaPrimanja();
        }
    }
    $veci = $ukupnaPrimanjaMuskih / $brojMuskih < $ukupnaPrimanjaZenskih / $brojZenskih ? $ukupnaPrimanjaZenskih / $brojZenskih : $ukupnaPrimanjaMuskih / $brojMuskih;
    $manji = $ukupnaPrimanjaMuskih / $brojMuskih < $ukupnaPrimanjaZenskih / $brojZenskih ? $ukupnaPrimanjaMuskih / $brojMuskih : $ukupnaPrimanjaZenskih / $brojZenskih;

    echo "Prosječna primanja muških osoba: " . number_format($ukupnaPrimanjaMuskih / $brojMuskih, 2, '.', '') . "\n";
    echo "Prosječna primanja ženskih osoba: " . number_format($ukupnaPrimanjaZenskih / $brojZenskih, 2, '.', '') . "\n";
    echo "Razlika u prosječnim primanjima muških i ženskih osoba: " . number_format($veci - $manji, 2, '.', '') . "\n";
}

