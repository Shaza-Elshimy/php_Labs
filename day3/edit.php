<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
require_once "connection.php";
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $skills = implode(",", $_POST['skills']);
    $department = $_POST['department'];

    $conn->query("UPDATE users SET fname='$fname', lname='$lname', address='$address', skills='$skills', department='$department' WHERE id=$id");

    header("Location: list.php");
    exit;
}
?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Edit User</h2>

    <form method="post" class="border p-4 rounded shadow-sm">

        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="fname" class="form-control"
                   value="<?php echo $row['fname']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="lname" class="form-control"
                   value="<?php echo $row['lname']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control"
                   value="<?php echo $row['address']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Skills</label>

            <?php
            $all_skills = ['JS','React','Node.js','Tailwind'];
            $user_skills = explode(",", $row['skills']);

            foreach($all_skills as $s){
                $checked = in_array($s,$user_skills) ? "checked" : "";

                echo "<div class='form-check form-check-inline'>
                        <input class='form-check-input' type='checkbox'
                               name='skills[]' value='$s' $checked>
                        <label class='form-check-label'>$s</label>
                      </div>";
            }
            ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Department</label>
            <input type="text" name="department" class="form-control"
                   value="<?php echo $row['department']; ?>">
        </div>

        <div class="d-grid">
            <input type="submit" name="update" value="Update"
                   class="btn btn-primary">
        </div>

    </form>
</div>

</body>
</html>