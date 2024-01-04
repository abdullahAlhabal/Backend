<?php 

// include_once "./math.php";
# here we can access the functions in the math.php file like add and subtract


# echo add(3,5).PHP_EOL;      // 8
# echo subtract(3,5).PHP_EOL;      // -2

# in this case , the math.php in necessary to run the file , so the best is to use require instead of include 

require_once "./math.php";

echo add(3,5).PHP_EOL;      // 8
echo subtract(3,5).PHP_EOL;      // -2


?>
