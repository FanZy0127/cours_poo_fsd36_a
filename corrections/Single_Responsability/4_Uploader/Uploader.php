<?php

require_once 'FileInformation.php';
require_once 'ImageResizer.php';

class Uploader
{
    private $name;
    private $type;
    public $directory = '';
    public $validTypes = [];

    public function __construct($file)
    {
        $fileData = $_FILES[$file];
        $this->temporaryName = $fileData['tmp_name'];
        $this->name = $fileData['name'];
        $this->type = $fileData['type'];
    }

    public function uploadFile()
    {
        $extensionDetector = new ExtensionDetector();
        if (!$extensionDetector->isValidType($this->type)) {
            $this->error = 'Le fichier ' . $this->name . ' n\'est pas d\'un type valide';

            return false;
        }

        return true;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getExtension()
    {
        $fileInformation = new FileInformation();
        
        return $fileInformation->getExtension($this->name);
    }

    public function resize($origin, $destination, $width, $maxHeight)
    {
        $imageResizer = new ImageResizer();
        
        return $imageResizer->resize($this->getExtension(), $origin, $destination, $width, $maxHeight);
    }
}
