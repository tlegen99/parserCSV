<?php

namespace Classes;

use Classes\CarBase;

/* class Truck */

class Truck extends CarBase
{
    private $carType;
    
    private  $bodyWhl;
    
    private  $bodyWidth = 0;
    
    private  $bodyHeight = 0;
    
    private  $bodyLength = 0;
    
    private  $bodyVolume;
    
    public function __construct($params)
    {
        $this->carType = "truck";
        $this->bodyWhl = $params->bodyWhl;
        $this->getBodyWhl();
        $this->bodyVolume = $this->getBodyVolume();
        
        parent::__construct($params->brand, $params->photoFileName, $params->carrying);
    }
    
    public function getBodyVolume()
    {
        return $this->bodyWidth * $this->bodyLength * $this->bodyHeight;
    }
    
    public function getBodyWhl()
    {
        if (isset($this->bodyWhl) && !empty($this->bodyWhl)) {
            $parameters = explode('x', $this->bodyWhl);
            $this->bodyWidth  = (float)$parameters[0];
            $this->bodyHeight = (float)$parameters[1];
            $this->bodyLength = (float)$parameters[2];
        }
    }
}