<?php 

class Boy extends Person{
 
    private bool $hadMilitaryService = false ; 

    public function __construct(){
        echo "hay from Boy\n";
    }

    public function setHadMilitryService(bool $status) :void{
        $this->hadMilitaryService =  $status; 
    }
    public function isHadMilitryService() : string{
        return ($this->hadMilitaryService) ? "Yes" : "NO" ; 
    }
    public function changeStateusOfMilitryService() :void{
        // $this->hadMilitaryService =  ($this->hadMilitaryService) ? false : true ; 
        $this->hadMilitaryService =  !$this->hadMilitaryService ; 
    }
    public function eat(): void {
        parent::eat();
        echo "as a boy";
    }

}