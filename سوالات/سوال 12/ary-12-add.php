<?php
echo "نام و شهر جدید";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نام و شهر جدید</title>
</head>

<body>

    <form action="ary-12-add-action.php" method="post">
       `code_meli`, `firstname`, `lastname`, `city`
        <p>
            <label for="code_meli">کد ملی</label>
            <input type="text" name="code_meli" id="code_meli">
        </p>
        <p>
            <label for="firstname">نام</label>
            <input type="text" name="firstname" id="firstname">
        </p>
        <p>
            <label for="lastname">نام خانوادگی</label>
            <input type="text" name="lastname" id="lastname">
        </p>
        <p>
            <label for="city">شهر </label>
            <input type="text" name="city" id="city">
        </p>
         <input type="submit" value="ثبت">
    </form>

</body>

</html>