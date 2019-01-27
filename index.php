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
//                ispisZaposlenika($zaposleniciArray);
                var_dump($zaposleniciArray);
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
                ispisiIzbornikStatistike();
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

function ispisZaposlenika($array)
{
    echo "*************************************************\n";
    for ($i = 0; $i < count($array); $i++) {
        echo "ID: " . $array[$i]->id;
        echo "IME: " . $array[$i]->ime;
        echo "PREZIME: " . $array[$i]->prezime;
        echo "DATUM ROĐENJA: " . $array[$i]->datumRodenja;
        echo "SPOL: " . $array[$i]->spol;
        echo "MJESEČNA PRIMANJA: " . $array[$i]->mjesecnaPrimanja;
        echo "*************************************************\n";
    }
}

function unosZaposlenika($array = null)
{

    echo "ID: ";
    $id = kontrolaId(readline(),$array);
    echo "Ime: ";
    $ime = kontrolaImenaIPrezimena(readline());
    echo "Prezime: ";
    $prezime = kontrolaImenaIPrezimena(readline());
    echo "Datum rođenja: ";
    $datumRodenja = readline();
    echo "Spol: ";
    $spol = readline();
    echo "Mjesečna primanja: ";
    $mjesecnaPrimanja = kontrolaMjesecnoPrimanje(readline());

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
function kontrolaImenaIPrezimena($var)
{
    if($var==="" || preg_match('~[0-9]+~', $var)){
        echo "Ime/prezime ne može biti prazno i sadržavati brojeve.\nUnesite novo ime/prezime:\n";

        return kontrolaImenaIPrezimena(readline());
    }else{
        return $var;
    }


}
function kontrolaId($var,$array)
{
    for($i=0;$i<count($array);$i++){
        if($array[$i]->id===$var){
            echo "Zaposlenik s istim ID-em već postoji.\nUnesite novi ID:\n";
            return kontrolaId(readline(),$array);

        }
    }
    return $var;
}

function kontrolaMjesecnoPrimanje($var)
{
    var_dump($var);
    $var = floatval(str_replace(",",".",$var));
    var_dump($var);
    if($var==="" || !is_float($var) || $var<=0){
        echo "Mjesečno primanje mora biti decimalan broj veći od 0.\nUnesite novu vrijednost:\n";

        return kontrolaMjesecnoPrimanje(readline());
    }else{
        return number_format($var,2,'.','');
    }
}

