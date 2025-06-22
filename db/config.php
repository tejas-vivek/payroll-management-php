<?php 
    $conn = mysqli_connect('localhost', 'root', 'Root@2024#', 'payroll');
    if(!$conn){
        die('Connection failed'.mysqli_connect_error());
    }
?>