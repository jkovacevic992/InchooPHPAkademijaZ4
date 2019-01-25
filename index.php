<?php
require 'Zaposlenik.php';

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

                print_r(Zaposlenik::$sviZaposlenici);
                echo "Želite li se vratiti na izbornik? (DA/NE)\n";
                if (strtolower(trim(fgets(STDIN))) !== 'da') {
                    $bool = false;
                }
                break;

            }
        case 2:
            {
                echo "Upišite sve potrebne podatke: \n";
                unosZaposlenika();
                break;
            }
        case 3:
            {
                echo Zaposlenik::$sviZaposlenici[0]->id;
                break;
            }
        case 4:
            {
                echo "Upišite ID zaposlenika kojeg želite obrisati: \n";
                brisanjeZaposlenika(fgets(STDIN));
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
    new Zaposlenik($id, $ime, $prezime, $datumRodenja, $spol, $mjesecnaPrimanja);
}

function brisanjeZaposlenika($zaposlenik){
    for($i=0;$i<=count(Zaposlenik::$sviZaposlenici);$i++){
        if(isset(Zaposlenik::$sviZaposlenici[$i]) && Zaposlenik::$sviZaposlenici[$i]->id===$zaposlenik){
            Zaposlenik::$sviZaposlenici[$i]=null;
            unset(Zaposlenik::$sviZaposlenici[$i]);

        }
    }
    Zaposlenik::$sviZaposlenici = array_values(Zaposlenik::$sviZaposlenici);
    return Zaposlenik::$sviZaposlenici;
}




