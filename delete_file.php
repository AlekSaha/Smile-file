<?php
session_start();

include 'existing_file.php';
$pathToUploadDir = 'C:\\xampp\\htdocs\\Smile\\uploadfiles\\';

$files = getFiles($pathToUploadDir);

if (!empty($_POST['btn-del'])){
    $delFile = $pathToUploadDir . $files[$_POST['btn-del'] - 1];
    if (file_exists($delFile)) {
        $_SESSION['message'] = 'Файл ' . $files[$_POST['btn-del'] - 1] . ' был удален';
        unlink($delFile);
        header('location: /Smile/index.php');
    }
}