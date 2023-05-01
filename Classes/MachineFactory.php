<?php

namespace Classes;

use Classes\Car;
use Classes\Truck;
use Classes\SpecMachine;

class MachineFactory
{

    public static function createClassMachine($carType, $params)
    {
        switch ($carType) {
            case "car":
                return new Car($params);
            case "truck":
                return new Truck($params);
            case "spec_machine":
                return new SpecMachine($params);
            default:
                throw new \Exception("Не найден тип: " . $carType);
        }
    }
}