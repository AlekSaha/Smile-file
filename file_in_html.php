<tr>
    <td><?= $index?></td>
    <td><?= $nameOfFile?></td>
    <td align="center"><?= filesize($pathToFile)?> байт</td>

    <td align="center">
        <form action="save_file.php" method="post">
            <button name="btn-save" value =<?=$index?>>
                <img src="picture\save.png" alt="Save"  width="25%" height="25%">
            </button>
        </form>
    </td>

    <td align="center">
        <form action="delete_file.php" method="post">
            <button name="btn-del" value =<?=$index?>>
                <img src="picture\del.png" alt="Del"  width="25%" height="25%">
            </button>
        </form>
    </td>
</tr>