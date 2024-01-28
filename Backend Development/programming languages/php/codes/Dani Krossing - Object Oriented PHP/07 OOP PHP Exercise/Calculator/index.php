<?php

declare(strict_types = 1);
// require_once "includes/autoload.php";

?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Calculator</title>
        </head>
        <body>
            
            <form action="includes/calc.php" method="post">

            <input type="number" step="0.1" name="num1" value="5" id="" placeholder="enter num1">
            <select name="op" id="">
                <option disabled>select an operator</option>
                <option value="add">add</option>
                <option value="sub">sub</option>
                <option value="mult">mult</option>
                <option value="div">div</option>
            </select>
            <input type="number" step="0.1" name="num2" value="5" id="" placeholder="enter num2">

            <button type="submit">Calcuate</button>

            </form>

        </body>
    </html>