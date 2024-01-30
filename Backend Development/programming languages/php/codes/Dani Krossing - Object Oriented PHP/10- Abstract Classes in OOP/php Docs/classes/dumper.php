<?php 

abstract class Dumper{
    abstract public function dump($data);
}

class WebDumper{
    public function dump($data){
        echo "<pre>";
        echo var_dump($data);
        echo "</pre>";
    }
}

class CliDumper{
    public function dump($data){
        var_dump($data);
    }
}


class DumpFactory{
    public static function getDumper(){
        $res = PHP_SAPI === 'cli' ? new CliDumper() : new WebDumper() ;
        return $res;
    }
}

$dumper = new DumpFactory();
$dumper::getDumper()->dump("php");