<?php

class Router
{

    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}
