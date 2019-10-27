<?php

session_start();

$pathToUploadDir = 'C:\\xampp\\htdocs\\Smile\\uploadfiles\\';
$whiteList = ['TXT', 'JPEG', 'JPG', 'XML', 'DOCX', 'XLS', 'XLSX', 'CSV', 'MP4', 'AVI', 'PDF', 'MKV']; //Допустимые расширения
$whiteListOk = 1; //Пройдена ли проверка на допустимое расширение файла
$uploadErrors =['Ошибок не возникло, файл был успешно загружен на сервер.',
    'Размер принятого файла превысил максимально допустимый размер в 2 Мб',
    'Размер принятого файла превысил максимально допустимый размер в 2 Мб',
    'Загружаемый файл был получен только частично.',
    'Файл не был загружен.',
    'Отсутствует временная папка.',
    'Не удалось записать файл на диск',
    'PHP-расширение остановило загрузку файла.']; //Ошибки при загрузке


if (!isset($_POST['uploadFile'])){
    if (!empty($_FILES['uploadFile'])) {
        if (in_array(strtoupper(pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION)), $whiteList)) {
            $whiteListOk = 1;
        } else {
            $whiteListOk = 0;
        }

        if ($_FILES['uploadFile']['error'] == 0 && $_FILES['uploadFile']['size'] > 0
            && $_FILES['uploadFile']['size'] < (1024 * 1024 * 2)
            && $whiteListOk == 1) {

            $fileName = $_FILES['uploadFile']['tmp_name'];

            if (move_uploaded_file($fileName, $pathToUploadDir . $_FILES['uploadFile']['name'] .
                mktime() . '.' . pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION))) {
                $_SESSION['message'] = 'Файл ' . $_FILES['uploadFile']['name'] . ' был сохранен';
                $_SESSION['message'] = 'Файл ' . $_FILES['uploadFile']['name'] . ' был сохранен';
                header('location: /Smile/index.php');
            } else {
                echo 'Can not save file';
            }
        } else {
            if ($whiteListOk == 0) {
                if (pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION) == '') {
                    $_SESSION['message'] = 'Файл не выбран';
                    header('location: /Smile/index.php');
                } else {
                    $_SESSION['message'] = "<br/>" . 'Файл с расширением ' . pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION) . ' загрузить нельзя';
                    header('location: /Smile/index.php');
                }
            } else {
                $_SESSION['message'] = "<br/>" . 'Ошибка загрузки!' ."<br/>". ' Код: ' . $_FILES['uploadFile']['error'] . " " . $uploadErrors[$_FILES['uploadFile']['error']];
                header('location: /Smile/index.php');
            }
        }
    } else {
        $_SESSION['message'] = 'Ошибка, возможно файл превышает допустимый размер в 2 Мб' ."<br/>". 'Или файл имеет недопустимое расширение';
        header('location: /Smile/index.php');}
} else {$_SESSION['message'] = 'Ошибка2'; header('location: /Smile/index.php');}
?>