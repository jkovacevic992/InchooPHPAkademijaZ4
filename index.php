<?php
require 'Zaposlenik.php';

$a= new Zaposlenik(1,'mirko','azenić','19.2.1992.','muški', 2500);
$b= new Zaposlenik(2,'adam','marković','19.2.1932.','ženski', 150);

var_dump(Zaposlenik::$sviZaposlenici);


$bool=true;
//while($bool) {
//
//    ispisiIzbornik();
//
//
//    $izbor = trim(fgets(STDIN));
//
//
//    if ($izbor === 6) {
//
//        break;
//    }
//    switch ($izbor) {
//
//        case 1:
//            {
//
//                echo "Pozdrav\n";
//
//                echo "Želite li se vratiti na izbornik? (DA/NE)\n";
//                if(strtolower(trim(fgets(STDIN))) !== 'da') {
//                    $bool = false;
//                }
//                break;
//
//            }
//        case 2:
//            {
//
//            }
//        case 3:
//            {
//
//            }
//        case 4:
//            {
//
//            }
//        case 5:
//            {
//
//            }
//        case 6:
//            {
//                exit();
//            }
//        default:
//            {
//                echo "\n\nNiste odabrali ništa\n\n";
//            }
//    }
//
//
//}
//function ispisiIzbornik()
//{
//
//    echo "*************************************************\n";
//    echo "1. Pregled Zaposlenika\n";
//    echo "2. Unos novog Zaposlenika \n";
//    echo "3. Promjena podataka postojećem Zaposleniku\n";
//    echo "4. Brisanje Zaposlenika\n";
//    echo "5. Statistika\n";
//    echo "6. Izlaz\n";
//    echo "Odaberite broj od 1 do 6.\n";
//    echo "*************************************************\n";
//}





