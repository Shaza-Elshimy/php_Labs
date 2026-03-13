<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once "connection.php";
    $db = new DB();
$id = $_GET['id'];

$db->deleteData("users", "id=$id");
header("Location: list.php");
?>
</body>
</html>