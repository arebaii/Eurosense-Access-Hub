<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eurosense Access Hub</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel = "icon" href = "./icons/icon.png" type = "image/x-icon">
</head>
<body>

    <!-- Authentification -->
    <?php// include "Auth.php" ?>
    <?php include "Connect.php" ?>

    <div id ="header">
        <img class="logo" src="icons/logo.png">
        <a href="Auth.php"><img class="exit" src="icons/exit.png"></a>
        <h1>Eurosense Access Hub</h1>
    </div>

    <!-- Tabs function -> "tabs.js" -->
    <div id="Menu">
        <ul class="tabs">
            <li class="active"><a href="#Add"> <img alt="icone add" src="icons/add.png" class="icone" id="img_add"> Add </a></li>
            <li><a href="#Edit"> <img alt="icone edit" src="icons/edit.png" class="icone" id="img_edit">Edit </a></li>
            <li><a href="#Delete"> <img alt="icone delete" src="icons/delete.png" class="icone" id="img_delete">Delete </a></li>
            <li><a href="#Search"><img alt="icone search" src="icons/search.png" class="icone" id="img_search"> Search </a></li>
        </ul>

        <div class="tabs-content">
            <div class="tab-content active" id="Add">
                <?php include "Add.php" ?>
            </div>
            <div class="tab-content" id="Edit"> 
                <?php include "Edit.php" ?>
            </div>
            <div class="tab-content" id="Delete">
                <?php include "Delete.php" ?>
            </div>
            <div class="tab-content" id="Search">
                <?php include "Search.php" ?>
            </div>
        </div>
    </div>

    <div id="Map"></div>

</body>
<script src="leaflet.js"></script>
<script defer src="Ajax.js"></script>
<script defer src="tabs.js"></script>
</html>
