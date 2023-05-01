<?php

namespace Classes;
/* class CarBase */

class CarBase
{
    private $brand;
    
    private $photoFileName;
    
    private $carrying;
    
    
    public function __construct($brand, $photoFileName, $carrying)
    {
        $this->brand = $brand;
        if ($this->getPhotoFileExt($photoFileName)) {
            $this->photoFileName = $photoFileName;
        }
        $this->carrying = $carrying;
    }
    
    /**
     * Возвращает расширение файла
     *
     * @return string
     */
    public function getPhotoFileExt($photoFileName)
    {
        $info = new \SplFileInfo($photoFileName);
        
        return $info->getExtension();
    }
}