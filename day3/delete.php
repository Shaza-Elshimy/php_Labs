<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$conn = mysqli_connect("localhost", "root", "", "iti",3307);
$id = $_GET['id'];

$conn->query("DELETE FROM users WHERE id=$id");
$conn->close();
header("Location: list.php");
?>
</body>
</html>