<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }  
        h2{
            color: #333;
        }
        form{
            width: 300px;
            margin: 20px auto;
        }
        input[type="text"]{
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"]{
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background-color: #0056b3;
        }
        </style>
</head>
<body>
    <?php
$conn = mysqli_connect("localhost", "root", "", "iti",3307);
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(!empty($_POST['update'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $skills = implode(",", $_POST['skills']);
    $department = $_POST['department'];

    $conn->query("UPDATE users SET fname='$fname', lname='$lname', address='$address', skills='$skills', department='$department' WHERE id=$id");

    $conn->close();
    header("Location: list.php");
    exit;
}
?>

<form method="post">
    First Name: <input type="text" name="fname" value="<?= $row['fname'] ?>"><br>
    Last Name: <input type="text" name="lname" value="<?= $row['lname'] ?>"><br>
    Address: <input type="text" name="address" value="<?= $row['address'] ?>"><br>
    Skills:<br>

    <?php
    $all_skills = ['JS','React','Node.js','Tailwind'];
    $user_skills = explode(",", $row['skills']);

    foreach($all_skills as $s){
        $checked = in_array($s,$user_skills) ? "checked" : "";

        echo "<input type='checkbox' name='skills[]' value='$s' $checked> $s ";
    }
    ?>
    <br>
    Department: <input type="text" name="department" value="<?= $row['department'] ?>">
    <br>
    <input type="submit" name="update" value="Update">
</form>
</body>
</html>