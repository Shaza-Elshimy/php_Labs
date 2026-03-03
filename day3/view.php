<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }  
        
        h2,h3{
            color: #333;
        }
        ul{
            list-style-type: square;
            padding-left: 20px;

        }
        li{
            margin-bottom: 5px; 
       }

     </style>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "iti",3307);
    $id = $_GET['id'];

    
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    echo "<h2>".$row['fname']." ".$row['lname']."</h2>";
    echo "<p>Address: ".$row['address']."</p>";
    echo "<p>Skills: ".$row['skills']."</p>";
    echo "<p>Department: ".$row['department']."</p>";
    ?>
<a href="list.php">Back to list</a>
</body>
</html>