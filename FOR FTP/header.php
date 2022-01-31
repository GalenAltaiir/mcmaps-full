<?php

function headerMod()
{
    $prefix = "../";
    echo '<header class="header">';
    echo '<a href="' . $prefix . 'index.php" class="nav-logo"><img src="../img/logo.png" alt="logo"></a>';
    echo '<nav class="navbar">';
    echo '<ul class="nav-menu">';
    echo '<li class="nav-item">';
    echo '<a href="' . $prefix . 'index.php" class="nav-link">Latest </a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<span class="nav-link">';
    echo 'Map Categories <i class="fa fa-chevron-down"></i>';
    echo '<span class="dropdown">';
    echo '<a href="' . $prefix . 'pages/all-maps.php" class="nav-link">All Maps</a>';
    echo '<a href="' . $prefix . 'pages/all-maps.php?Category=Puzzle" class="nav-link">Puzzle</a>';
    echo '<a href="' . $prefix . 'pages/all-maps.php?Category=Parkour" class="nav-link">Parkour</a>';
    echo '<a href="' . $prefix . 'pages/all-maps.php?Category=Minigames" class="nav-link">Minigames</a>';
    echo '<a href="' . $prefix . 'pages/all-maps.php?Category=Maze" class="nav-link">Maze</a>';
    echo '<a href="' . $prefix . 'pages/all-maps.php?Category=PvP" class="nav-link">PvP</a>';
    echo '<a href="' . $prefix . 'pages/all-maps.php?Category=Horror" class="nav-link">Horror</a>';
    echo '<a href="' . $prefix . 'pages/all-maps.php?Category=Other" class="nav-link">Other</a>';
    // RACHEL STOPPED ME HERE THIS IS WHERE I NEED TO RESUME LATER :)
    // PS verified.php is now broken
    echo '</span>';
    echo '</span>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a href="' . $prefix . 'pages/map-jam.php" class="nav-link">Map Jam</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a href="' . $prefix . 'pages/verified.php" class="nav-link">Verified</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<span class="nav-link">';
    echo 'Other <i class="fa fa-chevron-down"></i>';
    echo '<span class="dropdown">';
    echo '<a href="' . $prefix . 'pages/upload-a-map.php" class="nav-link">Upload a Map</a>';
    echo '<a href="' . $prefix . 'pages/update-a-map.php" class="nav-link">Update a Map</a>';
    echo '</span>';
    echo '</span>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a href="' . $prefix . 'pages/search.php" class="nav-link">Search</a>';
    echo '</li>';
    echo '</ul>';
    echo '<div class="hamburger">';
    echo '<span class="bar"></span>';
    echo '<span class="bar"></span>';
    echo '<span class="bar"></span>';
    echo '</div>';
    echo '</nav>';
    echo '</header>';
}