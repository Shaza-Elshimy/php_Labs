<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }  
        h2{
            color: #333;
            text-align: center;
        }
        table{
            border-collapse: collapse;
            width: 80%;
            text-align: center;
            margin: 20px auto;
        }
        th, td{
            border: 1px solid #ccc;
            padding: 10px;
        }
        th{
            background-color: #f2f2f2;
        }
        a{
            text-decoration: none;
            background-color: #007BFF;
            color: white;                
            padding: 5px 10px;
            border-radius: 4px; 
        }
        a:hover{
            background-color: #0056b3;
        }
        .add-btn{
            display: block;
            width: 150px;
            margin: 20px auto;
            text-align: center;
        }

        </style>
</head>
<body>

<h2>Users Table</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Skills</th>
        <th>Department</th>
    </tr>
    <?php
    require_once "connection.php";

    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
        exit;
    }

    
    $result = $conn->query("SELECT * FROM users");

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['fname']."</td>";
        echo "<td>".$row['lname']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['skills']."</td>";
        echo "<td>".$row['department']."</td>";
        echo "<td><a href='view.php?id=$row[id]'>View</a></td>";
        echo "<td><a href='edit.php?id=$row[id]'>Edit</a></td>";
        echo "<td><a href='delete.php?id=$row[id]'>Delete</a></td>";
        echo "</tr>";
    }
    ?>

</table>
<?php

    echo "<a class='add-btn' href='form.php'>Add New User</a>";

?>
</body>
</html>