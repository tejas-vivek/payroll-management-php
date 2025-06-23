<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:./index.php');
        exit(0);
    }

    // echo $base_url = "http://".$_SERVER['SERVER_NAME'].'/payroll/;
    $app_path = $_SERVER['DOCUMENT_ROOT'].'/payroll/';
    include($app_path.'db/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Payroll Management</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css">
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