<?php
session_start();
if (isset($_SESSION["user_logged"]) && (!empty($_SESSION["user_logged"]))) {
    $user_logged = $_SESSION["user_logged"];
    //print_r($_SESSION);
} else {
    echo "مجاز نیستید";
    echo "<hr>";
    echo "<a href=\"login.php\">ورود</a>";
    exit;
}
?>
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
    include "../db.php";
    $cnn = (new db)->connection_database;
    //$cnn = new mysqli("localhost", "root", "", "school_db");

    if (
        isset($_GET["search_1"]) && !empty($_GET["search_1"])  &&
        isset($_GET["search_field_1"]) && !empty($_GET["search_field_1"]) &&
        isset($_GET["search_type"]) && !empty($_GET["search_type"])
    ) {

        $search_1 =  $_GET["search_1"];
        $search_field_1 =  $_GET["search_field_1"];
        $search_type =  $_GET["search_type"];

        if (
            isset($_GET["search_2"]) && !empty($_GET["search_2"])  &&
            isset($_GET["search_field_2"]) && !empty($_GET["search_field_2"])
        ) {
            $search_2 =  $_GET["search_2"];
            $search_field_2 =  $_GET["search_field_2"];


            if ($search_field_1 == "all" &&  $search_type  == "daghigh") {
                $sql = "SELECT * FROM `teacher` as t 
                WHERE t.code_meli = '$search_1' OR 
                t.firstname = '$search_1' OR 
                t.lastname = '$search_1';
            ";
            } else if ($search_field_1 != "all" &&  $search_type  == "daghigh") {
                $sql = "SELECT * FROM `teacher` 
                WHERE 
                `$search_field_1` = '$search_1' 
                and
                `$search_field_2` = '$search_2' 
                 ";
                //SELECT *  FROM `student`  as s WHERE s.firstname LIKE 'علی' and s.lastname like 'محمدی'
            } else if ($search_field_1 == "all" &&  $search_type  == "Nadaghigh") {
                $sql = "SELECT * FROM `teacher` as t 
            WHERE t.code_meli LIKE '%$search_1%' OR 
            t.firstname LIKE '%$search_1%' OR 
            t.lastname LIKE '%$search_1%';
            ";
            } else if ($search_field_1 != "all" &&  $search_type  == "Nadaghigh") {
                $sql = "SELECT * FROM `teacher` 
                WHERE 
                `$search_field_1` like '%$search_1%'
                and
                `$search_field_2` like '%$search_2%'                
                ";
            }
        } else {  // جستجو بر اساس یک فیلد
            if ($search_field_1 == "all" &&  $search_type  == "daghigh") {
                $sql = "SELECT * FROM `teacher` as t 
                WHERE t.code_meli = '$search_1' OR 
                t.firstname = '$search_1' OR 
                t.lastname = '$search_1';
            ";
            } else if ($search_field_1 != "all" &&  $search_type  == "daghigh") {
                $sql = "SELECT * FROM `teacher` WHERE `$search_field_1` = '$search_1'";
            } else if ($search_field_1 == "all" &&  $search_type  == "Nadaghigh") {
                $sql = "SELECT * FROM `teacher` as t 
            WHERE t.code_meli LIKE '%$search_1%' OR 
            t.firstname LIKE '%$search_1%' OR 
            t.lastname LIKE '%$search_1%';
            ";
            } else if ($search_field_1 != "all" &&  $search_type  == "Nadaghigh") {
                $sql = "SELECT * FROM `teacher` WHERE `$search_field_1` = '$search_1'";
            }
        }






        $result = $cnn->query($sql);
        if ($result->num_rows > 0) {
    ?>
            <p>
                <a href="teacher-add.php">معلم جدید</a>
            </p>

            <table>
                <tr>
                    <th>code_meli</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>عملیات</th>
                </tr>
                <?php
                while ($record = $result->fetch_assoc()) {

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
                            <a href="teacher-edit.php?xyz=<?= $record["code_meli"] ?>">ویرایش</a>
                            <a href="teacher-delete.php?xyz=<?= $record["code_meli"] ?>">حذف</a>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>

        <?php
        } else {
            echo "جستجو نتیجه ای نداشت!";
        }
    } else {

        $a = "SELECT * FROM `teacher`";

        $r = $cnn->query($a);
        ?>

        <p>
            <a href="teacher-add.php">معلم جدید</a>
        </p>

        <table>
            <tr>
                <th>code_meli</th>
                <th>firstname</th>
                <th>lastname</th>
            </tr>
            <?php
            while ($record = $r->fetch_assoc()) {

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
                        <a href="teacher-edit.php?xyz=<?= $record["code_meli"] ?>">ویرایش</a>
                        <a href="teacher-delete.php?xyz=<?= $record["code_meli"] ?>">حذف</a>

                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

    <?php
    }
    ?>



    <form action="" method="get">
        <p>
            <label for="search_1">جستجو:</label>
            <input type="text" id="search_1" name="search_1">

            <select name="search_field_1" id="search_field_1">
                <option value="all">همه فیلدها</option>
                <option value="code_meli">کد ملی</option>
                <option value="firstname">نام</option>
                <option value="lastname">نام خانوادگی</option>
            </select>
        </p>

        <p>
            <label for="search_2">جستجو:</label>
            <input type="text" id="search_2" name="search_2">

            <select name="search_field_2" id="search_field_2">
                <option value="all">همه فیلدها</option>
                <option value="code_meli">کد ملی</option>
                <option value="firstname">نام</option>
                <option value="lastname">نام خانوادگی</option>
            </select>
        </p>
        <p>
            <label for="search_type_daghigh">جستجوی دقیق</label>
            <input type="radio" value="daghigh" name="search_type" id="search_type_daghigh">
            <br>
            <label for="search_type_Nadaghigh">جستجوی بخشی از متن</label>
            <input type="radio" value="Nadaghigh" name="search_type" id="search_type_Nadaghigh">
        </p>
        <p><input type="submit" value="جستجو کن"></p>
    </form>





</body>

</html>