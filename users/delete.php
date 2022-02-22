<?php

include('../connect.php');
$id = $_GET['id'];
if (is_int($id) === TRUE){
    
} 

$sql = "DELETE FROM users WHERE id=$id";
if ($mysqli->query($sql) === TRUE) {
   
    header('Location: list.php');
    
  } else {
    echo "Error deleting record: " . $mysqli->error;
    die();
  }

?>