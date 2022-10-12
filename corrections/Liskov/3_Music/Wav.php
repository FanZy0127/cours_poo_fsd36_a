<?php

require_once 'MusicType.php';
require_once 'InvalidExtensionException.php';

class Wav extends MusicType
{
    public function listen() : string
    {
        $extension = pathinfo($this->filename, PATHINFO_EXTENSION);
        if ($extension !== 'wav') {
            throw new InvalidExtensionException('Wav', $extension);
        }

        return 'Lecture du fichier Wav '. $this->filename;
    }
}
