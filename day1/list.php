<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list data</title>
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
            table{
                margin: 20px auto;
                width: 70%;
                border-collapse: collapse;
            }
            th, td{
                padding: 8px;
                text-align: center;
                height: 30px;
            }
            th{
                background-color: #f2f2f2;
            }
            a{
                text-decoration: none;
                background-color: #007BFF;
                color: white;                
                padding: 5px 10px;
                border-radius: 4px; 
            }
            a:hover{
                background-color: #0056b3;
            }

    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Skills</th>
            <th>Department</th>
        </tr>
        <?php
            $file = "data.txt";
            if(file_exists($file)){
                $data = file($file);

                foreach($data as $index=> $row){
                   $row_data= explode(":", $row);
                    echo "<tr>";
                    foreach($row_data as $val){
                    echo "<td>$val</td>";
                    }
                    echo "<td><a href='view.php?id=$index'>View</a></td>";
                    echo "<td><a href='edit.php?id=$index'>Edit</a></td>";
                    echo "<td><a href='delete.php?id=$index'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data found.</td></tr>";
            }
         ?>
        </table>
    
</body>
</html>