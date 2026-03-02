<?php
$id = $_GET['id'];
$rows = file("data.txt");

unset($rows[$id]); 
$data=implode("", $rows);
file_put_contents("data.txt",$data );

header("Location: list.php");
?>