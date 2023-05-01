<?php

namespace Classes;

use Classes\CarBase;

/* class SpecMachine */

class SpecMachine extends CarBase
{
    private $carType;
    
    private $extra;
    
    public function __construct($params)
    {
        $this->carType = "spec_machine";
        $this->extra   = $params->extra;
        
        parent::__construct($params->brand, $params->photoFileName, $params->carrying);
    }
}