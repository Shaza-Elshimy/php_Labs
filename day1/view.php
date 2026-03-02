<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view data</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }  
        
        h2,h3{
            color: #333;
        }
        ul{
            list-style-type: square;
            padding-left: 20px;

        }
        li{
            margin-bottom: 5px; 
       }

          </style>
</head>
<body>
    <?php
    $id = $_GET['id'];
    $row = file("data.txt");
            $data= explode(":", $row[$id]);
            echo "<h2>Name: " . $data[0] . " " . $data[1] . "</h2>";
            echo "<h3>Address: " . $data[2] . "</h3>";
            echo "<h3>Skills: " ;
            $skills=explode(",", $data[3]);
            echo "<ul>";
            foreach($skills as $skill){
                echo "<li>$skill</li>";
            }
            echo "</ul>";
            echo "<h3>Department: " . $data[4] . "</h3>";
    ?>
</body>
</html>