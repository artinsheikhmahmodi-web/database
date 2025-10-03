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
        /*
            echo "search:";
            print_r($_GET["search"]);
            echo "<br>";
            echo "search_field:";
        print_r($_GET["search_field"]);
        exit;
        */


        $search =  $_GET["search"];
        $search_field =  $_GET["search_field"];
        $search_type =  $_GET["search_type"];

        if ($search_field == "all" &&  $search_type  == "daghigh") {
            $sql = "SELECT * FROM `modir` as m 
                WHERE m.code_meli = '$search' OR 
                m.firstname = '$search' OR 
                m.lastname = '$search';";

            $sql = "SELECT d.code_meli,d.firstname,d.lastname , m.code_madreseh,m.name 
        FROM `modir` as d INNER join madreseh as m
        WHERE m.code_meli = '$search' OR 
                m.firstname = '$search' OR 
                m.lastname = '$search';";
        } else if ($search_field != "all" &&  $search_type  == "daghigh") {
            $sql = "SELECT * FROM `modir` WHERE `$search_field` = '$search'";
        } else if ($search_field == "all" &&  $search_type  == "Nadaghigh") {
            $sql = "SELECT * FROM `modir` as m 
                WHERE m.code_meli LIKE '%$search%' OR
                m.firstname LIKE '%$search%' OR
                m.lastname LIKE '%$search%';";
        } else if ($search_field != "all" &&  $search_type  == "Nadaghigh") {
            $sql = "SELECT * FROM `modir` WHERE `$search_field` = '$search'";
        }

        exit($sql);

        $result = $cnn->query($sql);
        if ($result->num_rows > 0) {
    ?>
            <p>
                <a href="modir-add.php">مدیر جدید</a>
            </p>
            <table>
                <tr>
                    <th>code_meli</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <?php
                    print_r($_GET);
                    exit();
                    if (isset($_GET["option"])) //&& $_GET["option"] == "select_modir") 
                    {
                    ?>
                        <th>انتخاب</th>
                    <?php
                    } else {
                    ?>
                        <th>عملیات</th>
                    <?php
                    }
                    ?>
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
                            <a href="modir-edit.php?xyz=<?= $record["code_meli"] ?>">ویرایش</a>
                            <a href="modir-delete.php?xyz=<?= $record["code_meli"] ?>">حذف</a>

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
    } else {  // بدون جستجو

        if (isset($_GET["option"]) && $_GET["option"] == "select_modir") {
            $a = "SELECT d.code_meli,d.firstname,d.lastname , m.code_madreseh,m.name 
            FROM `modir` as d left join madreseh as m on m.code_modir = d.code_meli 
             ORDER by m.name
            ";
        } else {
            $a = "SELECT d.code_meli,d.firstname,d.lastname , m.code_madreseh,m.name 
            FROM `modir` as d left join madreseh as m on m.code_modir = d.code_meli";
        }




        $r = $cnn->query($a);
        ?>

        <p>
            <a href="modir-add.php">مدیر جدید</a>
        </p>
        <table>
            <tr>
                <th>کد ملی مدیر</th>
                <th>نام مدیر</th>
                <th>نام خانوادگی</th>
                <th>کد مدرسه</th>
                <th>نام مدرسه</th>
                <?php

                if (isset($_GET["option"]) && $_GET["option"] == "select_modir") {
                ?>
                    <th>انتخاب</th>
                <?php
                } else {
                ?>
                    <th>عملیات</th>
                <?php
                }
                ?>

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
                        if (isset($_GET["option"]) && $_GET["option"] == "select_modir") {
                            if (empty($record["code_madreseh"])) {
                        ?>
                                <input type="radio" name="selected_modir" id="selected_modir<?= $record["code_meli"] ?>" 
                                value="<?= $record["code_meli"] ?>"  onclick="selected_modir(<?= $record['code_meli'] ?>)">
                            <?php
                            }
                        } else {
                            ?>
                            <a href="modir-edit.php?xyz=<?= $record["code_meli"] ?>">ویرایش</a>
                            <a href="modir-delete.php?xyz=<?= $record["code_meli"] ?>">حذف</a>
                        <?php
                        }
                        ?>


                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

        <?php

        if (isset($_GET["option"]) && $_GET["option"] == "select_modir") {
        ?>
            <a href="../madreseh/madreseh-add.php?option=selected_modir&code_modir=" id="code_modir_selected">برگشت به مدرسه جدید</a>

            <script>
                function selected_modir(id) {
                    let url_base = "../madreseh/madreseh-add.php?option=selected_modir&code_modir=";
                    url_base += id;
                    console.log(document.querySelector("#code_modir_selected"))
                    document.querySelector("#code_modir_selected").href = url_base
                }
            </script>

    <?php
        }
    }
    ?>



    <form action="" method="get">
        <p>
            <label for="search">جستجو:</label>
            <input type="text" id="search" name="search">

            <select name="search_field" id="search_field">
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