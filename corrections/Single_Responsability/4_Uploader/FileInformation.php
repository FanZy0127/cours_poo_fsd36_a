<?php

class FileInformation
{
    public function getExtension(string $name)
    {
        return pathinfo($name, PATHINFO_EXTENSION);
    }
}
