<?php

function headerMod()
{
    echo '<header class="header">';
    echo '<a href="../index.php" class="nav-logo"><img src="../img/logo.png" alt="logo"></a>';
    echo '<nav class="navbar">';
    echo '<ul class="nav-menu">';
    echo '<li class="nav-item">';
    echo '<a href="/index.html" class="nav-link">Latest </a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<span class="nav-link">';
    echo 'Map Categories <i class="fa fa-chevron-down"></i>';
    echo '<span class="dropdown">';
    echo '<a href="/pages/maps/all-maps.html" class="nav-link">All Maps</a>';
    echo '<a href="/pages/maps/puzzle.html" class="nav-link">Puzzle</a>';
    echo '<a href="/pages/maps/parkour.html" class="nav-link">Parkour</a>';
    echo '<a href="/pages/maps/minigames.html" class="nav-link">Minigames</a>';
    echo '<a href="/pages/maps/maze.html" class="nav-link">Maze</a>';
    echo '<a href="/pages/maps/pvp.html" class="nav-link">PvP</a>';
    echo '<a href="/pages/maps/horror.html" class="nav-link">Horror</a>';
    echo '<a href="/pages/maps/other.html" class="nav-link">Other</a>';
    echo '</span>';
    echo '</span>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a href="/pages/map-jam.html" class="nav-link">Map Jam</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a href="/pages/verified.html" class="nav-link">Verified</a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<span class="nav-link">';
    echo 'Other <i class="fa fa-chevron-down"></i>';
    echo '<span class="dropdown">';
    echo '<a href="/pages/upload-a-map.html" class="nav-link">Upload a Map</a>';
    echo '<a href="/pages/update-a-map.html" class="nav-link">Update a Map</a>';
    echo '</span>';
    echo '</span>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a href="/pages/search.html" class="nav-link">Search</a>';
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