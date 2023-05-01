<?php

namespace Classes;

use Classes\CarBase;

/* class Car */

class Car extends CarBase
{
    private $carType;
    
    public $passengerSeatsCount;
    
    public function __construct($params)
    {
        $this->carType             = "car";
        $this->passengerSeatsCount = $params->passengerSeatsCount;
        
        parent::__construct($params->brand, $params->photoFileName, $params->carrying);
    }
}