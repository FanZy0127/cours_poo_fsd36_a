<?php

require_once 'Uploader.php';

function it($message,$path){
    echo"\033[3",$path?'2m✔︎':'1m✘'.register_shutdown_function(function(){die(1);}),"$message\033[0m\n";
}

$_FILES['fichier.png'] = [
    'tmp_name' => './fichier.png',
    'name' => 'fichier.png',
    'type' => 'png',
];

$_FILES['mauvais_fichier.xls'] = [
    'tmp_name' => 'mauvais_fichier.xls',
    'name' => 'mauvais_fichier.xls',
    'type' => 'xls',
];

// CAS 1 : un bon fichier
$pngUploader = new Uploader('fichier.png');
it('Upload Fichier png', $pngUploader->uploadFile(sys_get_temp_dir()) == true);

// CAS 2 : un mauvais fichier
$excelUploader = new Uploader('mauvais_fichier.xls');

it('Upload Fichier excel', $excelUploader->uploadFile(sys_get_temp_dir()) == true);
var_dump($excelUploader->error);