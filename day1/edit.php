
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit page</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }  
        
        h2{
            text-align: center;
            color: #333;
        }
        h3{
            color: #555;
          }
            form{
                border: 2px solid #ccc;
                padding: 10px;
                border-radius: 5px;   
                text-align: center; 
                width: 60%;
                margin:20px auto;
            }
            input[type="text"] {
                width: 300px;
                padding: 10px;
                margin: 5px 0;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            input[type="submit"] {
                background-color: #007BFF;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            </style>
</head>
<body>
    <?php
        $file = "data.txt";
        $id = $_GET['id'];
        $rows = file($file);
        $data = explode(":", trim($rows[$id]));

        if(!empty($_POST['submit'])){
            $rows[$id] = $_POST['fname'] . ":" . $_POST['lname'] . ":" . $_POST['address'] . ":" . $_POST['skills'] . ":" . $data[4] . "\n"; // department ثابت
            file_put_contents($file, implode("", $rows));
            header("Location: list.php");
            exit;
        }
    ?>

    <h2>Edit Row</h2>
    <form method="post">
        First Name: <input type="text" name="fname" value="<?php echo $data[0]; ?>"><br><br>
        Last Name: <input type="text" name="lname" value="<?php echo $data[1]; ?>"><br><br>
        Address: <input type="text" name="address" value="<?php echo $data[2]; ?>"><br><br>
        Skills: <input type="text" name="skills" value="<?php echo $data[3]; ?>"><br><br>
        Department: <input type="text" value="<?php echo $data[4]; ?>" readonly><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>