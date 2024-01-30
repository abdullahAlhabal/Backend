<?php

require_once __DIR__ . "/../../includes/autoloadInterfaces.php";

class DatabaseLogger  {
    public function log($message)
    {
        echo sprintf("Log %s to the database\n", $message);
    }
}