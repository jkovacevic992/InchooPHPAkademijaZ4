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
                for($i=0;$i<count($zaposleniciArray);$i++){
                    echo "ID: ".$zaposleniciArray[$i]->id;
                    echo "IME: ".$zaposleniciArray[$i]->ime;
                    echo "PREZIME: ".$zaposleniciArray[$i]->prezime;
                    echo "DATUM ROĐENJA: ".$zaposleniciArray[$i]->datumRodenja;
                    echo "SPOL: ".$zaposleniciArray[$i]->spol;
                    echo "MJESEČNA PRIMANJA: ".$zaposleniciArray[$i]->mjesecnaPrimanja;
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

                break;
            }
        case 4:
            {
                echo "Upišite ID zaposlenika kojeg želite obrisati: \n";
                $temp=fgets(STDIN);
                echo "Jeste li sigurni da želite obrisati polaznika s ID-em $temp? (DA/NE)\n";

                if(readline() !== 'da'){
                    echo "Zaposlenik nije obrisan.\n";
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

function unosZaposlenika(){

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

//
//function brisanjeZaposlenika($array,$zaposlenikId){
//    for($i=0;$i<=count($array);$i++){
//        if(isset($array[$i]) && $array[$i]->getId()===$zaposlenikId){
//            $array[$i]= null;
//            unset($array[$i]);
//        }
//    }
//    $array = array_values($array);
//    return $array;
//}



