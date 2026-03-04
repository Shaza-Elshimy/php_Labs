

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php

require_once "connection.php";
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>
<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title"><?php echo $row['fname'] . " " . $row['lname']; ?></h2>
            
            <p class="card-text"><strong>Address:</strong> <?php echo $row['address']; ?></p>
            
            <p class="card-text"><strong>Skills:</strong></p>
            <ul>
                <?php
                $skills = explode(",", $row['skills']);
                foreach($skills as $s){
                    echo "<li class='list-group-item'>" . $s . "</li>";
                }
                ?>
            </ul>

            <p class="card-text"><strong>Department:</strong> <?php echo $row['department']; ?></p>

            <a href="list.php" class="btn btn-primary mt-3">Back to List</a>
        </div>
    </div>

</div>

</body>
</html>