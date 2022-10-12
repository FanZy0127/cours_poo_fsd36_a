<?php

class ExtensionDetector
{
    const PNG_FAMILY = ['PNG', 'png'];
    const JPEG_FAMILY = ['jpeg', 'jpg', 'JPG'];

    public function getExtension(string $extension)
    {
        if (in_array($extension, self::JPEG_FAMILY)) {
            $extension = 'jpeg';
        } elseif (in_array($extension, self::PNG_FAMILY)) {
            $extension = 'png';
        }

        return $extension;
    }

    public function isValidType(string $extension)
    {
        $validExtensions = array_merge(self::JPEG_FAMILY, self::PNG_FAMILY);

        return in_array($extension, $validExtensions);
    }
}
