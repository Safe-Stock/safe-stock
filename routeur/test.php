<?php 
    $file = file('../data/test.csv');

    foreach($file as $k) {
        $csv[] = explode(';', $k);
    }

   foreach($csv as $ligne) {
       print("<br />");
       print("____________________________");
       print("<br />");
       foreach($ligne as $col) {
           print($col . " / ");
       }
   }
?>