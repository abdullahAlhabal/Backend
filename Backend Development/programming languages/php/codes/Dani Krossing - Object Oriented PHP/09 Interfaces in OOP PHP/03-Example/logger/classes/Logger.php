<?php 


interface Logger{
    public function log($message);
}

class FileLogger implements Logger{

    private $handle ; 
    private $logFile ; 

    public function __construct($file_name , $mode = 'a'){

        // open log file for append 
        $this->handle = fopen($file_name , $mode)
                            or die("Couldn't open the file\n");
    }


    public function log($message){
        $message = date("Y-m-d H:i:s") . " : " . $message . "\n";
        fwrite($this->handle,$message);
    }

    public function __destruct(){
        if($this->handle){
            fclose($this->handle);
        }
    }
}

class DatabaseLogger implements Logger{
    public function log($message){
        echo sprintf("Log : %s  - into the database - %s",$message,date('Y-m-d H:i:s'));
    }
}

// $file_logger = new FileLogger("txt.txt" , 'a');
// $file_logger->log("Hire Me now!");
// 
// $database_logger = new DatabaseLogger();
// $database_logger->log("MESSAGE HERE");

$loggers = [
    new FileLogger("test.txt" , 'a') ,
    new DatabaseLogger() ,
];

foreach($loggers as $i => $log){
    $i . " - " . $log->log("log ");
}

?>

