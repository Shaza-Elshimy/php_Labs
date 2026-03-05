<?php
require_once "connection.php";
$errors=[];
if(isset($_GET['errors'])){
$errors=json_decode($_GET['errors'], true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Registration Form</h2>

    <form action="connection.php" method="POST" class="border p-4 rounded shadow-sm">

        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" name="fname" id="fname" class="form-control">
            <?php
            if(isset($errors['fname'])){
                echo "<small class='text-danger'>{$errors['fname']}</small>";
            }
            ?>
        </div>

        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" name="lname" id="lname" class="form-control">
            <?php
            if(isset($errors['lname'])){
                echo "<small class='text-danger'>{$errors['lname']}</small>";
            }
            ?>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control" rows="3"></textarea>
            <?php
            if(isset($errors['address'])){
                echo "<small class='text-danger'>{$errors['address']}</small>";
            }
            ?>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <select name="country" id="country" class="form-select">
                <option value="">Select Country</option>
                <option value="Egypt">Egypt</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
            </select>
            <?php
            if(isset($errors['country'])){
                echo "<small class='text-danger'>{$errors['country']}</small>";
            }
            ?>
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Gender</label>
            <div class="form-check form-check-inline">
                <input type="radio" name="gender" value="Male" id="male" class="form-check-input">
                <label for="male" class="form-check-label">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="gender" value="Female" id="female" class="form-check-input">
                <label for="female" class="form-check-label">Female</label>
            </div>
            <?php
            if(isset($errors['gender'])){
                echo "<small class='text-danger'>{$errors['gender']}</small>";
            }
            ?>
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Skills</label>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="skills[]" value="JS" class="form-check-input" id="js">
                <label for="js" class="form-check-label">JS</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="skills[]" value="React" class="form-check-input" id="react">
                <label for="react" class="form-check-label">React</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="skills[]" value="nodeJs" class="form-check-input" id="nodejs">
                <label for="nodejs" class="form-check-label">nodeJs</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="skills[]" value="Tailwind" class="form-check-input" id="tailwind">
                <label for="tailwind" class="form-check-label">Tailwind</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control">
            <?php
            if(isset($errors['email'])){
                echo "<small class='text-danger'>{$errors['email']}</small>";
            }
            ?>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <?php
            if(isset($errors['password'])){
                echo "<small class='text-danger'>{$errors['password']}</small>";
            }
            ?>
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" name="department" id="department" value="Open Source" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="code" id="code" class="form-control">
            <small class="text-muted">Please insert the code below</small>
        </div>
        <div class="d-flex justify-content-between">
            <input type="submit" name="register" value="Submit" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-secondary">
        </div>

    </form>
</div>

<script>
    const codeInput = document.querySelector('input[name="code"]');
    const submitButton = document.querySelector('input[type="submit"]');
    const verificationCode = "Sh68Sa";

    submitButton.addEventListener('click', function(event) {
        if (codeInput.value !== verificationCode) {
            event.preventDefault();
            alert("Incorrect verification code. Please try again.");
        }
    });
</script>

</body>
</html>