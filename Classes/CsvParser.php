<?php

namespace Classes;

use Classes\ParamsMachineDTO;
use Classes\MachineFactory;

/* class CsvParser */

class CsvParser
{
    // указатель на файл
    protected $fp;
    
    // заголовок таблицы
    protected $header;
    
    /**
     * Открываем файл на чтение
     *
     * @param $file
     * @param bool $header
     *
     * @return $this
     * @throws \Exception
     */
    public function open($file, $header = true)
    {
        $this->fp = fopen($file, 'r');
        
        if ( ! $this->fp) {
            throw new \Exception('Невозможно прочитать файл ' . $file);
        }
        
        if ($header) {
            // получаем заголовок
            $this->header = fgetcsv($this->fp);
        }
        
        return $this;
    }
    
    /**
     * Разбирает файл, передавая данные из файла
     *
     * @return array
     */
    public function parse()
    {
        if ( ! $this->fp) {
            throw new \Exception('Файл не открыт!');
        }
        
        $carList = [];
        
        while (($data = fgetcsv($this->fp, 10000, ";")) !== false) {
            
            $params = new ParamsMachineDTO($data);
            
            if ($this->isParamsCorrect($params)) {
                $factory = MachineFactory::createClassMachine($params->carType, $params);
                array_push($carList, $factory);
            }
        }
        
        return $carList;
    }
    
    private function isParamsCorrect($params) {
        
        if ( ! empty($params->brand) && ! empty($params->photoFileName) && ! empty($params->carrying)) {
            return true;
        }
        return false;
    }
    
    public function __destruct()
    {
        $this->close();
    }
    
    public function close()
    {
        if ($this->fp) {
            fclose($this->fp);
            $this->fp = null;
        }
    }
}