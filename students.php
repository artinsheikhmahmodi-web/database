<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        td,
        th {
            border: 1px solid;
        }
    </style>
</head>

<body>


    <?php
    $cnn = new mysqli("localhost", "root", "", "soal_8_ary_php_mysql_soalat_amali");

    $a = "SELECT * FROM `students`;";

    $r = $cnn->query($a);

    //print_r($record);
    ?>
    <p>
        <a href="student-add.php">دانش آموز جدید</a>
    </p>
    <table>
        <tr>
            <th>code_meli</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>father</th>
            <th>grade</th>
            <th>عملیات</th>
        </tr>
        <?php
        while ($record = $r->fetch_assoc()) {
            //$record = $r->fetch_assoc();
        ?>
            <tr>
                <td>
                    <?php
                    echo $record["code_meli"];
                    ?>
                </td>
                <td>
                    <?php
                    echo $record["firstname"];
                    ?>
                </td>
                <td>
                    <?php
                    echo $record["lastname"];
                    ?>
                </td>
                <td>
                    <?php
                    echo $record["father"];
                    ?>
                </td>
                <td>
                    <?php
                    echo $record["grade"];
                    ?>
                </td>
                <td>
                    <a href="student-edit.php?xyz=<?= $record["code_meli"] ?>">ویرایش</a>
                    <a href="student-delete.php?xyz=<?= $record["code_meli"] ?>">حذف</a>
                    
                </td>
            </tr>
        <?php
        }
        ?>



    </table>

</body>

</html>