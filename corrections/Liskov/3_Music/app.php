<?php

require_once 'InvalidFileException.php';
require_once 'Music.php';
require_once 'Mp3.php';
require_once 'Wav.php';


try {
    $mp3File = 'wannabee.mp3';
    $wav = new Wav($mp3File);
    $music = new Music($wav);
    $music->listen();
} catch(InvalidFileException $e) {
    it('Exception levée pour Mp3 !== Wav', $e->getMessage() === 'Fichier Wav attendu mais "mp3" obtenu');
}

try {
    $wavFile = 'happy.wav';
    $mp3 = new Mp3($wavFile);
    $music = new Music($mp3);
    $music->listen();
} catch(InvalidFileException $e) {
    it('Exception levée pour Wav !== Mp3', $e->getMessage() === 'Fichier Mp3 attendu mais "Wav" obtenu');
}

try {
    $truncatedFile = 'truncated_file';
    $mp3 = new Mp3($truncatedFile);
    $music = new Music($mp3);
    $music->listen();
} catch(Exception $e) {
    it(
        'Exception levée pour fichier sans extension',
        $e->getMessage() === 'Les fichiers sans extension ne sont pas acceptés.'
    );
}