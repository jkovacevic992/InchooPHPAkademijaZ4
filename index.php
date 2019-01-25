<?php
require 'Zaposlenik.php';

$a= new Zaposlenik();
$b= new Zaposlenik();
$c= new Zaposlenik();

$bool=true;
while($bool) {

    printMenu();


    $choice = trim(fgets(STDIN));


    if ($choice === 6) {

        break;
    }
    switch ($choice) {

        case 1:
            {

                echo "Pozdrav";
                $bool=false;
                break;

            }
        case 2:
            {

            }
        case 3:
            {

            }
        case 4:
            {

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
                echo "\n\nNo choice is entered. Please provide a valid choice.\n\n";
            }
    }


}
function printMenu()
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





