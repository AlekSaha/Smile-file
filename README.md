# Smile-file

Here is the test-task description:
* create a website with FORM to upload files,
* show list of uploaded files in a table with informative columns,
* allow to do certain operations with uploaded files: Delete, Download,

Extra options:
* look and feel of developed result,
* using git repository (github or bitbucket) during development,
* upload progress


Использовал XAMPP и значения которые установлены в php.ini по умолчанию
Локалка, XAMPP, находится у меня по адресу C:\xampp\htdocs\Smile\
file_uploads - on
post_max_size - 8M
upload_max_filesize	 - 2M
upload_tmp_dir - C:\xampp\tmp
max_input_time	- 60 time to load
max_input_vars - 1000 length of array to upload
max_file_uploads - 20 number of files to upload in one time

look and feel of developed result – внешний вид заставляет желать лучшего, мало практики в HTML и CSS
using git repository (github or bitbucket) during development – использовал только для загрузки результата того что получилось. Тема для меня абсолютно новая, в начале вообще не понимал как это может быть реализовано. С github так же нет практики работы. 
upload progress – видел, что процесс загрузки можно отслеживать так как описано по этой ссылке https://www.php.net/manual/ru/session.upload-progress.php но из-за того, что размер загружаемого файла ограничен 2Мб и сама загрузка происходит довольно быстро – обработать не получилось
