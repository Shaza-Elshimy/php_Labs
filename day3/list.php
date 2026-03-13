        <?php
        require_once "connection.php";
        $db = new DB();

        session_start();
        $img=isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : "uploads/default.png";
        if(!isset($_SESSION['user_id'])){
            header("Location: login.php");
            exit;
        }
        ?>
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
        .nav-container{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0% 20px    ;
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
    <div class="nav-container">
        <img src="uploads/<?= $img ?>" width="60" height="60"/>
        <span class="navbar-brand">Welcome, <?= $_SESSION['user_name'] ?></span>
        <div class="ms-auto">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center">Users List</h2>


    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Skills</th>
            <th>Department</th>
            <th>Profile Pic</th>
        </tr>
        </div>

        <?php
        $result = $db->getData("users");

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['fname']."</td>";
            echo "<td>".$row['lname']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['skills']."</td>";
            echo "<td>".$row['department']."</td>";
            echo "<td><img src='uploads/".$row['profile_pic']."' width='50' height='50'/></td>";
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