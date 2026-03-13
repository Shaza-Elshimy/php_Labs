<?php
$conn = new mysqli("localhost", "root", "", "iti",3307);

if(!$conn){
    die("Connection failed");
}
if(isset($_POST['register'])){
$errors=[];
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$address = trim($_POST['address']);
$email= trim($_POST['email']);
$password=trim($_POST['password']);
$country = trim($_POST['country']);
$gender = $_POST['gender'];
$skills = !empty($_POST['skills']) ? implode(",", $_POST['skills']) : "";
$department = trim($_POST['department']);

if(empty($fname)){
    $errors['fname'] = "First name is required";
}

if(empty($lname)){
    $errors['lname'] = "Last name is required";
}

if(empty($address)){
    $errors['address'] = "Address is required";
}

if(empty($email)){
    $errors['email'] = "Email is required";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Invalid email format";
}

if(empty($country)){
    $errors['country'] = "Country is required";
}

if(empty($gender)){
    $errors['gender'] ="Gender is required";
}

if(empty($_POST['skills'])){
    $errors['skills'] ="Select at least one skill";
}
if(empty($password)){
    $errors['password'] = "Password is required";
}else if(strlen($password) < 6){
    $errors['password'] = "Password must be at least 6 characters";
}else if(!preg_match("/[A-Z]/", $password)){
    $errors['password'] = "Password must contain at least one uppercase letter";
}else if(!preg_match("/[a-z]/", $password)){
    $errors['password'] = "Password must contain at least one lowercase letter";
}else if(!preg_match("/[0-9]/", $password)){
    $errors['password'] = "Password must contain at least one number";
}else if(!preg_match("/[@$!%*?&#]/", $password)){
    $errors['password'] = "Password must contain at least one special character";
}
$img_name = "";
if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === 0){
    $img_name = $_FILES['profile_pic']['name'];
    $tmp_name = $_FILES['profile_pic']['tmp_name'];
    $upload_dir = "./uploads/";

    move_uploaded_file($tmp_name, $upload_dir . $img_name);
}

if(empty($errors)){
 $conn->query("INSERT INTO users (fname, lname, address,email,password, skills, department, profile_pic)
            VALUES ('$fname', '$lname', '$address', '$email', '$password', '$skills', '$department', '$img_name')");

    header("Location: list.php");
}else{
    header(header: "Location: form.php?errors=" . json_encode($errors));
}
}
?>
