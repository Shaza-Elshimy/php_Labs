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
            margin: 20px auto;
        }
        th, td{
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th{
            background-color: #f2f2f2;
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
    $conn = mysqli_connect("localhost", "root", "", "iti",3307);

    $result = $conn->query("SELECT * FROM users");

    $conn->close();
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

</body>
</html>