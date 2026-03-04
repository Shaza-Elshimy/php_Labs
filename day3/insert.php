<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    require_once "connection.php";
    $skills = !empty($_POST['skills']) ? implode(",", $_POST['skills']) : "";

    $sql = "INSERT INTO users (fname, lname, address, skills, department)
    VALUES ('$_POST[fname]', '$_POST[lname]', '$_POST[address]', '$skills', '$_POST[department]')";

    $conn->query($sql);

    header("Location: list.php");
    ?>
</body>
</html>