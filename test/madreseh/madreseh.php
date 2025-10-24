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
        isset($_GET["search"]) && !empty($_GET["search"])  &&
        isset($_GET["search_field"]) && !empty($_GET["search_field"]) &&
        isset($_GET["search_type"]) && !empty($_GET["search_type"])
    ) {

        $search =  $_GET["search"];
        $search_field =  $_GET["search_field"];
        $search_type =  $_GET["search_type"];

        if ($search_field == "all" &&  $search_type  == "daghigh") {
            /*
            $sql = "SELECT * FROM `madreseh` as m 
            WHERE m.code_madreseh = '$search' OR 
            m.name = '$search' OR 
            m.code_modir = '$search';";
            */

            $sql = "SELECT m.code_madreseh,m.name,m.code_modir,d.firstname,d.lastname 
                FROM `madreseh` as m
                inner join modir as d on d.code_meli = m.code_modir
                 WHERE m.code_madreseh = '$search' OR 
                    m.name = '$search' OR 
                    d.firstname = '$search' OR 
                    d.lastname = '$search' OR 
                    m.code_modir = '$search';
                ";

            //exit($sql);

        } else if ($search_field != "all" &&  $search_type  == "daghigh") {
            // $sql = "SELECT * FROM `madreseh` WHERE `$search_field` = '$search'";
            if ($search_field =  "name_modir") {
                $sql = "SELECT m.code_madreseh,m.name,m.code_modir,d.firstname,d.lastname 
                FROM `madreseh` as m
                inner join modir as d on d.code_meli = m.code_modir
                 WHERE d.firstname = '$search' OR 
                    d.lastname = '$search';";
            } else {
                $sql = "SELECT m.code_madreseh,m.name,m.code_modir,d.firstname,d.lastname 
                FROM `madreseh` as m
                inner join modir as d on d.code_meli = m.code_modir
                 WHERE `$search_field` = '$search';";
            }
        } else if ($search_field == "all" &&  $search_type  == "Nadaghigh") {
            /*
            $sql = "SELECT * FROM `madreseh` as m 
                WHERE m.code_madreseh LIKE '%$search%' OR
                m.name LIKE '%$search%' OR
                m.code_modir LIKE '%$search%';";
                */

            $sql = "SELECT m.code_madreseh,m.name,m.code_modir,d.firstname,d.lastname 
                FROM `madreseh` as m
                inner join modir as d on d.code_meli = m.code_modir
                 WHERE 
                 m.code_madreseh LIKE '%$search%' OR
                m.name LIKE '%$search%' OR
                d.firstname LIKE '%$search%' OR 
                d.lastname LIKE '%$search%' OR 
                m.code_modir LIKE '%$search%';
                 ";
        } else if ($search_field != "all" &&  $search_type  == "Nadaghigh") {
            $sql = "SELECT * FROM `madreseh` WHERE `$search_field` like  '%$search%'";

            if ($search_field =  "name_modir") {
                $sql = "SELECT m.code_madreseh,m.name,m.code_modir,d.firstname,d.lastname 
                FROM `madreseh` as m
                inner join modir as d on d.code_meli = m.code_modir
                 WHERE d.firstname like '%$search%' OR 
                    d.lastname like '%$search%';";
            } else {
                $sql = "SELECT m.code_madreseh,m.name,m.code_modir,d.firstname,d.lastname 
                FROM `madreseh` as m
                inner join modir as d on d.code_meli = m.code_modir
                WHERE `$search_field` like  '%$search%';";
            }
        }

        $result = $cnn->query($sql);
        if ($result->num_rows > 0) {
    ?>

            <p>
                <a href="madreseh-add.php">مدرسه جدید</a>
            </p>
            <table>
                <tr>
                    <th>کد مدرسه</th>
                    <th>نام مدرسه</th>
                    <th>کد مدیر</th>
                    <th>نام مدیر</th>
                    <th>عملیات</th>
                </tr>
                <?php
                while ($record = $result->fetch_assoc()) {
                    //$record = $r->fetch_assoc();
                ?>
                    <tr>
                        <td>
                            <?php
                            echo $record["code_madreseh"];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $record["name"];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $record["code_modir"];
                            ?>
                        </td>
                        <td>
                        <?php
                        echo $record["firstname"] . " " . $record["lastname"];
                        ?>
                    </td>
                        <td>
                            <a href="madreseh-edit.php?xyz=<?= $record["code_madreseh"] ?>">ویرایش</a>
                            <a href="madreseh-delete.php?xyz=<?= $record["code_madreseh"] ?>">حذف</a>
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
        //$a = "SELECT * FROM `madreseh`";
        $a = "SELECT m.code_madreseh,m.name,m.code_modir,d.firstname,d.lastname 
                FROM `madreseh` as m
                left join modir as d on d.code_meli = m.code_modir";

        $r = $cnn->query($a);

        //print_r($record);
        ?>
        <p>
            <a href="madreseh-add.php">مدرسه جدید</a>
        </p>
        <table>
            <tr>
                <th>کد مدرسه</th>
                <th>نام مدرسه</th>
                <th>کد مدیر</th>
                <th>نام مدیر</th>
                <th>عملیات</th>
            </tr>
            <?php
            while ($record = $r->fetch_assoc()) {
                //$record = $r->fetch_assoc();
            ?>
                <tr>
                    <td>
                        <?php
                        echo $record["code_madreseh"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["name"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["code_modir"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $record["firstname"] . " " . $record["lastname"];
                        ?>
                    </td>
                    <td>
                        <a href="madreseh-edit.php?xyz=<?= $record["code_madreseh"] ?>">ویرایش</a>
                        <a href="madreseh-delete.php?xyz=<?= $record["code_madreseh"] ?>">حذف</a>
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
            <label for="search">جستجو:</label>
            <input type="text" id="search" name="search">

            <select name="search_field" id="search_field">
                <option value="all">همه فیلدها</option>
                <option value="code_madreseh">کد مدرسه</option>
                <option value="name">نام</option>
                <option value="code_modir">کد مدیر</option>
                <option value="name_modir">نام مدیر</option>
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