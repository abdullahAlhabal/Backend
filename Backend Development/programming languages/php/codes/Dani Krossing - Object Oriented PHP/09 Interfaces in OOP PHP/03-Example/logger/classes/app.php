<?php

$handle = fopen("./text.txt" , "w");
fwrite($handle , "what About Your Father\n");
fclose($handle);

?>
