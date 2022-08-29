<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://icons8.com/icons/set/barbershop">
    <title>Barbershop Lindi</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-container">
                <div id="paralogo">
                    <img src="../HairStyle/images/icons8-barbershop-pole-64.png">
                    </div>
                <div class="logo">
            <a href="index.php">
                <h3>Barbershop Lindi</h3>
            </a>
        </div>
        <div id="paralogo">
            <img src="../HairStyle/images/icons8-barbershop-pole-64.png">
            </div>
        <div class="navbar">
        <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="qmimet.php">Qmimet</a></li>
                <?php
                if (isset($_SESSION['antari'])) {
                    echo "<li><a href='stilet.php'>Stilet</a></li>";
                    if ($_SESSION['antari']['roli'] == 1) {
                        echo "<li><a href='qmimet.php'>Qmimet</a></li>";
                        
                    }
                    
                }
                ?>
                <?php
                if(!isset($_SESSION['antari'])){
                echo "<li><a href='regjistrohu.php'>Regjistrohu</a></li>";
                }
                ?>
                
            </ul>
        </div>
    </div>
    </div>
    </header>