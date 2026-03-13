<?php
class DB{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "iti";
    private $port = 3307;
    private $conn;  
    public function __construct(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname, $this->port);
        if($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function getConnection(){
        return $this->conn;
    }

    public function getData($table, $condition = 1){
        return $this->conn->query("SELECT * FROM $table WHERE $condition");
    }

    public function insertData($table, $data){
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";
        return $this->conn->query($sql);
    }

    public function updateData($table, $data, $condition){
        $set = "";
        foreach($data as $column => $value){
            $set .= "$column='$value', ";
        }
        $set = rtrim($set, ", ");
        $sql = "UPDATE $table SET $set WHERE $condition";
        return $this->conn->query($sql);
    }

    public function deleteData($table, $condition){
        $sql = "DELETE FROM $table WHERE $condition";
        return $this->conn->query($sql);
    }
}
$db = new DB();
$conn = $db->getConnection();

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
    $db->insertData("users", [
        'fname' => $fname,
        'lname' => $lname,
        'address' => $address,
        'email' => $email,
        'password' => $password,
        'skills' => $skills,
        'department' => $department,
        'profile_pic' => $img_name
    ]);
    header("Location: list.php");
}else{
    header(header: "Location: form.php?errors=" . json_encode($errors));
}
}
?>
