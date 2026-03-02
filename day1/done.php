<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }  
        
        h2{
            color: #333;
        }
        h3{
            color: #555;
}
            </style>

</head>
<body>
    <?php
        $text =($_POST['gender']=="Male")?"Mr.":"Ms.";

        echo "<h2>Thanks $text $_POST[fname] $_POST[lname]</h2>";
        echo "<h2>please review your information</h2>";
        echo "<h3>Name: " . $_POST['fname'] . " " . $_POST['lname'] . "</h3>";
        echo "<h3>Address: " . $_POST['address'] . "</h3>";

        echo "Your skills: <br>";

        echo "<ul>";
        if (!empty($_POST['skills'])) {
            foreach($_POST['skills'] as $skill){
                echo "<li>$skill</li>";
            }
        }
        echo "</ul>";
        echo "<h3>Department: " . $_POST['department'] . "</h3>";

        //store data in a file

        $file = "data.txt";

        $skills = !empty($_POST['skills']) ? implode(", ", $_POST['skills']) : "";

        $data=$_POST['fname'] . ":" . $_POST['lname'] . ":" . $_POST['address'] . ":" . $skills . ":" . $_POST['department'] . "\n";
        file_put_contents($file, $data, FILE_APPEND);
        header("Location: list.php");
        ?>
       
</body>
</html>