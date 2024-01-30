<?php 


// where Interface can extends from another Interface , Inherit 

interface Readable {
    public function Read();
}

interface Writable {
    public function write();
}

interface Document extends Readable, Writable{
    public function getInfo();
}

class Paper implements Document {

    public function Read(){
        echo "Read()\n";
    }
    public function write(){
        echo "write()\n";        
    }
    public function getInfo(){
        echo "getInfo()\n";        
    }
}

$paper = new Paper();
$paper->write();

?>
