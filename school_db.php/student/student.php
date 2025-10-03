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
    $cnn = new mysqli("localhost", "root", "", "school_db");

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
                $sql = "SELECT * FROM `student` as s 
            WHERE s.code_meli = '$search_1' OR 
            s.firstname = '$search_1' OR 
            s.lastname = '$search_1' OR 
            s.father = '$search_1' OR 
            s.jenseiat = '$search_1' OR 
            s.tarikh_tavalod = '$search_1' OR 
            s.moadel = '$search_1' OR 
            s.tozihat = '$search_1' OR 
            s.code_modir = '$search_1';
            ";
            } else if ($search_field_1 != "all" &&  $search_type  == "daghigh") {
                $sql = "SELECT * FROM `student` 
                WHERE 
                `$search_field_1` = '$search_1' 
                and
                `$search_field_2` = '$search_2' 
                 ";
                //SELECT *  FROM `student`  as s WHERE s.firstname LIKE 'علی' and s.lastname like 'محمدی'
            } else if ($search_field_1 == "all" &&  $search_type  == "Nadaghigh") {
                $sql = "SELECT * FROM `student` as s 
            WHERE s.code_meli LIKE '%$search_1%' OR 
            s.firstname LIKE '%$search_1%' OR 
            s.lastname LIKE '%$search_1%' OR
            s.father LIKE '%$search_1%' OR 
            s.jenseiat LIKE '%$search_1%' OR 
            s.tarikh_tavalod LIKE '%$search_1%' OR 
            s.moadel LIKE '%$search_1%' OR 
            s.tozihat LIKE '%$search_1%' OR 
            s.code_modir LIKE '%$search_1%';
            ";
            } else if ($search_field_1 != "all" &&  $search_type  == "Nadaghigh") {
                $sql = "SELECT * FROM `student` 
                WHERE 
                `$search_field_1` like '%$search_1%'
                and
                `$search_field_2` like '%$search_2%'                
                ";
            }
        } else {  // جستجو بر اساس یک فیلد
            if ($search_field_1 == "all" &&  $search_type  == "daghigh") {
                $sql = "SELECT * FROM `student` as s 
            WHERE s.code_meli = '$search_1' OR 
            s.firstname = '$search_1' OR 
            s.lastname = '$search_1' OR 
            s.father = '$search_1' OR 
            s.jenseiat = '$search_1' OR 
            s.tarikh_tavalod = '$search_1' OR 
            s.moadel = '$search_1' OR 
            s.tozihat = '$search_1' OR 
            s.code_modir = '$search_1';
            ";
            } else if ($search_field_1 != "all" &&  $search_type  == "daghigh") {
                $sql = "SELECT * FROM `student` WHERE `$search_field_1` = '$search_1'";
            } else if ($search_field_1 == "all" &&  $search_type  == "Nadaghigh") {
                $sql = "SELECT * FROM `student` as s 
            WHERE s.code_meli LIKE '%$search_1%' OR 
            s.firstname LIKE '%$search_1%' OR 
            s.lastname LIKE '%$search_1%' OR
            s.father LIKE '%$search_1%' OR 
            s.jenseiat LIKE '%$search_1%' OR 
            s.tarikh_tavalod LIKE '%$search_1%' OR 
            s.moadel LIKE '%$search_1%' OR 
            s.tozihat LIKE '%$search_1%' OR 
            s.code_modir LIKE '%$search_1%';
            ";
            } else if ($search_field_1 != "all" &&  $search_type  == "Nadaghigh") {
                $sql = "SELECT * FROM `student` WHERE `$search_field_1` = '$search_1'";
            }
        }






        $result = $cnn->query($sql);
        if ($result->num_rows > 0) {
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
                    <th>jenseiat</th>
                    <th>tarikh_tavalod</th>
                    <th>moadel</th>
                    <th>tozihat</th>
                    <th>code_modir</th>
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
                            <?php
                            echo $record["father"];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $record["jenseiat"];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $record["tarikh_tavalod"];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $record["moadel"];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $record["tozihat"];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $record["code_modir"];
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

        <?php
        } else {
            echo "جستجو نتیجه ای نداشت!";
        }
    } else {

        $a = "SELECT * FROM `student`";

        $r = $cnn->query($a);
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
                <th>jenseiat</th>
                <th>tarikh_tavalod</th>
                <th>moadel</th>
                <th>tozihat</th>
                <th>code_modir</th>
                <th>عملیات</th>
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
                        <?php
                        echo $record["father"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["jenseiat"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["tarikh_tavalod"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["moadel"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["tozihat"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["code_modir"];
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
                <option value="father">نام پدر</option>
                <option value="jenseiat">جنسیت</option>
                <option value="tarikh_tavalod">تاریخ تولد </option>
                <option value="moadel">معدل</option>
                <option value="tozihat">توضیحات</option>
                <option value="code_modir">کد مدیر</option>
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
                <option value="father">نام پدر</option>
                <option value="jenseiat">جنسیت</option>
                <option value="tarikh_tavalod">تاریخ تولد </option>
                <option value="moadel">معدل</option>
                <option value="tozihat">توضیحات</option>
                <option value="code_modir">کد مدیر</option>
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