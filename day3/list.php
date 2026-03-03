<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
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

    $result = mysqli_query($conn, "SELECT * FROM users");

    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['fname']."</td>";
        echo "<td>".$row['lname']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['skills']."</td>";
        echo "<td>".$row['department']."</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>