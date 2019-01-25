<?php
require 'Zaposlenik.php';

$p= new Zaposlenik();
$p->setIme('Mirko');

//echo "Are you sure you want to do this?  Type 'yes' to continue: ";
//$handle = fopen ("php://stdin","r");
//$line = fgets($handle);
//if(trim($line) != 'yes'){
//    echo "ABORTING!\n";
//    exit;
//}
//fclose($handle);
//echo "\n";
//echo "Thank you, continuing...\n";
//echo $p->getIme();