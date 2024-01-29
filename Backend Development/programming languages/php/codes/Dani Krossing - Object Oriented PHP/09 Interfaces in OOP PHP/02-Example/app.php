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
        
    }
    public function write(){
        
    }
    public function getInfo(){
        
    }
}


?>
