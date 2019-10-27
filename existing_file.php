<?php
//Получаем массив файлов в папке $pathToUploadDir
function getFiles($pathToDir){
    $files = [];
    if (file_exists($pathToDir)){
        $d = opendir($pathToDir);
        while (($file = readdir($d)) !== false){
            if ($file == '.' || $file == '..' || !is_file($pathToDir . '\\' . $file)) {continue;}

            $files[] = $file;
        }
    }
    return $files;
}