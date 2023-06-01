<?php
include_once("inc/inc_fungsi.php");
include_once("inc/inc_koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM PAKAR</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="wrapper">
            <!-- Logo -->
            <div class="logo"><a href="">Error Code.</a></div>
            <div class="menu">
                <ul>
                    <li><a href="<?php url_dasar()?>#home">Home</a></li>
                    <li><a href="<?php url_dasar()?>#courses">Courses</a></li>
                    <li><a href="<?php url_dasar()?>#tutors">Tutors</a></li>
                    <li><a href="<?php url_dasar()?>#partners">Partners</a></li>
                    <li><a href="<?php url_dasar()?>#contact">Contact</a></li>
                    <li><a href="pendaftaran.php" class="tbl-yellow">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">