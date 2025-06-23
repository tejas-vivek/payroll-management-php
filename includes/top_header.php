<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:./index.php');
        exit(0);
    }

    // echo $base_url = "http://".$_SERVER['SERVER_NAME'].'/payroll/;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Payroll Management</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost:8080/payroll/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="http://localhost:8080/payroll/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="http://localhost:8080/payroll/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="http://localhost:8080/payroll/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="http://localhost:8080/payroll/css/style.css" rel="stylesheet">

</head>

<body>