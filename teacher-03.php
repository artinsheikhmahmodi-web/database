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

    $a = "SELECT * FROM `teacher`;";

    $r = $cnn->query($a);

    $record = $r->fetch_assoc();


    //print_r($record);
    ?>

    <table>
        <tr>
            <th>code_meli</th>
            <th>firstname</th>
            <th>lastname</th>
        </tr>
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
        </tr>
        <?php
        $record = $r->fetch_assoc();
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
        </tr>
        <?php
        $record = $r->fetch_assoc();
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
        </tr>
    </table>

</body>

</html>