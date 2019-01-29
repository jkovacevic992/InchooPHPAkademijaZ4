<?php
require 'Zaposlenik.php';
require 'functions.php';

$zaposleniciArray = [];
$bool = true;

$zaposleniciArray[] = new Zaposlenik('1', "josip", "kovačević", '17.01.1994', "muški", 123545.45);
$zaposleniciArray[] = new Zaposlenik('2', "mirko", "kovačević", '1.01.1989', "ženski", 20000);
$zaposleniciArray[] = new Zaposlenik('3', "mirko", "kovačević", '1.01.1973', "ženski", 20000);
$zaposleniciArray[] = new Zaposlenik('4', "mirko", "kovačević", '1.01.1965', "ženski", 20000);
$zaposleniciArray[] = new Zaposlenik('5', "mirko", "kovačević", '1.01.1985', "ženski", 20000);
$zaposleniciArray[] = new Zaposlenik('6', "mirko", "kovačević", '1.01.2000.', "ženski", 20000);
$zaposleniciArray[] = new Zaposlenik('7', "mirko", "kovačević", '29.02.1992.', "ženski", 20000);
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

