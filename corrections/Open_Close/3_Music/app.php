<?php

require_once 'Music.php';
require_once 'Mp3.php';
require_once 'Ogg.php';

function it($message,$p){
    echo"\033[3",$p?'2m✔︎':'1m✘'.register_shutdown_function(function(){die(1);})," $message\033[0m\n";
}

$mp3File = 'wannabee.mp3';
$mp3 = new Mp3($mp3File);
$music = new Music($mp3);

it('On écoute un fichier Mp3', $music->listen() === 'Lecture du fichier Mp3 wannabee.mp3');

$oggFile = 'happy.ogg';
$ogg = new Ogg($oggFile);
$music = new Music($ogg);

it('On écoute un fichier Ogg', $mp3->listen() === 'Lecture du fichier Ogg happy.ogg');