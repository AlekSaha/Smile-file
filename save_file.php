<?php
session_start();
include 'existing_file.php';
$pathToUploadDir = 'C:\\xampp\\htdocs\\Smile\\uploadfiles\\';
$files = getFiles($pathToUploadDir);
$saveFile = $pathToUploadDir . $files[$_POST['btn-save'] - 1];

if (!empty($_POST['btn-save'])) {
    if (file_exists($saveFile)) {
        // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
        // если этого не сделать файл будет читаться в память полностью!
        if (ob_get_level()) {
            ob_end_clean();
        }
        // заставляем браузер показать окно сохранения файла
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($saveFile));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($saveFile));
        // читаем файл и отправляем его пользователю
        readfile($saveFile);
        exit;
    }
}