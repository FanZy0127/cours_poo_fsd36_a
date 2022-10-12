<?php

interface MusicTypeInterface
{
    function getFilename() : string;

    /**
     * @throws InvalidFileExeption
     */
    function listen() : string;
}
