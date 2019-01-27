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
                echo "*************************************************\n";
                for ($i = 0; $i < count($zaposleniciArray); $i++) {
                    echo "ID: " . $zaposleniciArray[$i]->id;
                    echo "IME: " . $zaposleniciArray[$i]->ime;
                    echo "PREZIME: " . $zaposleniciArray[$i]->prezime;
                    echo "DATUM ROĐENJA: " . $zaposleniciArray[$i]->datumRodenja;
                    echo "SPOL: " . $zaposleniciArray[$i]->spol;
                    echo "MJESEČNA PRIMANJA: " . $zaposleniciArray[$i]->mjesecnaPrimanja;
                    echo "*************************************************\n";
                }
                echo "Želite li se vratiti na izbornik? (DA/NE)\n";
                if (strtolower(trim(fgets(STDIN))) !== 'da') {
                    $bool = false;
                }
                break;

            }
        case 2:
            {
                echo "Upišite sve potrebne podatke: \n";
                $zaposleniciArray[] = unosZaposlenika();

                break;
            }
        case 3:
            {
                echo "Upišite ID zaposlenika čije podatke želite mijenjati\n";
                $temp = fgets(STDIN);
                $zaposleniciArray= promjenaZaposlenika($zaposleniciArray, $temp);

                break;
            }
        case 4:
            {
                echo "Upišite ID zaposlenika kojeg želite obrisati: \n";
                $temp = fgets(STDIN);
                echo "Jeste li sigurni da želite obrisati polaznika s ID-em $temp? (DA/NE)\n";

                if (readline() !== 'da') {
                    echo "Zaposlenik nije obrisan.\n";
                }else{
                    $zaposleniciArray= brisanjeZaposlenika($zaposleniciArray,$temp);
                }

                break;
            }
        case 5:
            {

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

function unosZaposlenika()
{

    echo "ID: ";
    $id = fgets(STDIN);
    echo "Ime: ";
    $ime = fgets(STDIN);
    echo "Prezime: ";
    $prezime = fgets(STDIN);
    echo "Datum rođenja: ";
    $datumRodenja = fgets(STDIN);
    echo "Spol: ";
    $spol = fgets(STDIN);
    echo "Mjesečna primanja: ";
    $mjesecnaPrimanja = fgets(STDIN);
    return new Zaposlenik($id, $ime, $prezime, $datumRodenja, $spol, $mjesecnaPrimanja);

}


function brisanjeZaposlenika($array,$zaposlenikId)
{
    for($i=0;$i<=count($array);$i++){
        if(isset($array[$i]) && $array[$i]->id===$zaposlenikId){
            $array[$i]= null;
            unset($array[$i]);

        }
    }
    $array = array_values($array);
    return $array;
}

function promjenaZaposlenika($array,$zaposlenikId)
{

    for ($i = 0; $i <= count($array); $i++) {
        if ($array[$i]->id !== $zaposlenikId) {
            echo "Zaposlenik s tim ID-em ne postoji.";
            break;


        } else {
            echo "Koji podatak želite promijeniti (1-6)?\n";
            echo "1. ID\n";
            echo "2. IME\n";
            echo "3. PREZIME\n";
            echo "4. DATUM ROĐENJA\n";
            echo "5. SPOL\n";
            echo "6. MJESEČNA PRIMANJA\n";
            switch (fgets(STDIN)) {
                case 1:
                    {
                        echo "Stara vrijednost ID-a je ". $array[$i]->id . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->id= fgets(STDIN);
                    break;
                }
                case 2:
                    {
                        echo "Staro ime je ". $array[$i]->ime . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->ime= fgets(STDIN);
                        break;
                    }
                case 3:
                    {
                        echo "Staro prezime je ". $array[$i]->prezime . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->prezime= fgets(STDIN);
                        break;
                    }
                case 4:
                    {
                        echo "Stari datum rođenja je ". $array[$i]->datumRodenja . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->datumRodenja= fgets(STDIN);
                        break;

                    }
                case 5:
                    {
                        echo "Stari spol je ". $array[$i]->spol . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->spol= fgets(STDIN);
                        break;
                    }
                case 6:
                    {
                        echo "Stari iznos mjesečnih primanja je  ". $array[$i]->mjesecnaPrimanja . "\n";
                        echo "Unesite novu vrijednost:\n";
                        $array[$i]->mjesecnaPrimanja= fgets(STDIN);

                    }
            }
        }
    }
    return $array;
}



