<?php
/*
Локалка находится на ПК C:\xampp\htdocs\Smile\
file_uploads - on
post_max_size - 8M
upload_max_filesize	 - 2M
upload_tmp_dir - C:\xampp\tmp
max_input_time	- 60 time to load
max_input_vars - 1000 length of array to upload
max_file_uploads - 20 number of files to upload in one time
*/

session_start();
if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = '';
}
include 'existing_file.php';
$pathToUploadDir = 'C:\\xampp\\htdocs\\Smile\\uploadfiles\\';
$indexForTable = 1;  //нумерация для выводимых загруженных файлов
echo '***************************************************************************************';
echo "<br/>" . $_SESSION['message'] . "<br/>";
    //Выводим информацию о файле в таблицу
    function showFile($pathToUploadDir, $nameOfFile, $index){
        $pathToFile = $pathToUploadDir . $nameOfFile;
        include 'file_in_html.php';
    }

    $files = getFiles($pathToUploadDir);

?>

<form method="POST" action="upload_file.php" enctype="multipart/form-data">
    <input type="hidden" name="<?php echo ini_get("session.upload_progress.name"); ?>" value="123" />
    <input type="file" name="uploadFile">
    <button>Upload</button>
</form>

    <style type="text/css">
        th, td{
            border: 1px solid black;
        }
    </style>

<table>
    <caption>Upload files</caption>
    <thead>
        <tr>
            <th width="5%">№</th>
            <th width="45%">File</th>
            <th width="20%">Size</th>
            <th width="15%">Load file</th>
            <th width="15%">Delete file</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($files as $fl) {
                showFile($pathToUploadDir, $fl, $indexForTable);
                $indexForTable++;
            }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" align="center">This is the end...</td>
        </tr>
    </tfoot>
</table>
<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
        <span class="sr-only">45% Complete</span>
    </div>
</div>