<?php

namespace Classes;

class ParamsMachineDTO
{
    public $carType;
    
    public $brand;
    
    public $passengerSeatsCount;
    
    public $photoFileName;
    
    public $bodyWhl;
    
    public $carrying;
    
    public $extra;
    
    public function __construct($data)
    {
        $this->carType             = $data[0] ?? null;
        $this->brand               = $data[1] ?? null;
        $this->passengerSeatsCount = $data[2] ?? null;
        $this->photoFileName       = $data[3] ?? null;
        $this->bodyWhl             = $data[4] ?? null;
        $this->carrying            = $data[5] ?? null;
        $this->extra               = $data[6] ?? null;
    }
}