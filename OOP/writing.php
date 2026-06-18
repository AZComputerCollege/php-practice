<?php
     $file = fopen("test.txt","w");
     $txt = "Today weather is very owsome, So enjoy!";
     fwrite($file, $txt);
     fclose($file);


?>