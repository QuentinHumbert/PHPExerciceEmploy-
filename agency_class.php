<?php
class Agency{
    // Propriétés de la classe
    private $name = '';
    private $address = '';
    private $postalcode = '';
    private $city = '';
    private $foodservice = '';
    
    public function __construct($name,$adress,$postalcode,$city,$foodservice)
    {
        $this -> agencyname = $name;
        $this -> address = $adress;
        $this -> postalcode = $postalcode;
        $this -> city = $city;
        $this -> foodservice = $foodservice;
    }

    public function getAgencyName(){
        return $this -> agencyname;
    }

    public function getFoodService(){
        return $this -> foodservice;
    }

}

?>