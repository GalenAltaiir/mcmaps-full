<?php

function footMod()
{
    $prefix = "../";
    echo '<footer>';
    echo '<img src="../img/logo.png" alt="logo">';
    echo '<div class="footer-container">';
    echo '<div class="foot-nav">';
    echo '<a href="' . $prefix . 'index" class="nav-link">Latest</a>';
    echo '<a href="all" class="nav-link">All Maps</a>';
    echo '<a href="verified" class="nav-link">Verified</a>';
    echo '<a href="events" class="nav-link">Map Jam</a>';
    echo '<a href="search" class="nav-link">Search</a>';
    echo '<span class="submenu-foot"><span class="nav-link">More <i class="fa fa-chevron-down"></i></span>';
    echo '<span class="submenu-container-foot">';
    echo '<a href="upload-a-map" class="nav-link nav-link-sub">Upload a Map</a>';
    echo '<a href="update-a-map" class="nav-link nav-link-sub">Update a Map</a>';
    echo '<a href="logos-and-guidelines" class="nav-link nav-link-sub">Logos and Guidelines</a>';
    echo '</span>';
    echo '</span>';
    echo '</div>';
    echo '<p>Join our Discord Server</p>';
    echo '<a href="https://discord.gg/EBQt3VrX" target="_blank" class="btn"><i class="fab fa-discord"></i><b> DISCORD</b></a>';
    echo '<p>Visit our Friends</p>';
    echo '<span class="referral-container">';
    echo '<a href="https://stickypiston.co/" target="_blank" class="referral">StickyPiston.co</a>';
    echo '<a href="https://www.mccreations.net/" target="_blank" class="referral">MCCreations.net</a>';
    echo '<a href="https://mccontent.net/" target="_blank" class="referral">MCContent.net</a>';
    echo '</span>';

    echo '<p class="disclaimer">';
    echo '<a href="https://www.minecraft.net/" target="_blank">Minecraft</a> was created by <a href="https://www.minecraft.net/" target="_blank">Mojang AB</a>.';
    echo '<a href="https://www.mcmaps.net/" target="_blank">Mojang AB</a>.';
    echo '</p>';
    echo '</div>';
    echo '<p class="copyright">© 2021 All Rights Reserved | <a href="https://www.mcmaps.net/">MCMaps.net</a></p>';
    echo '</footer>';
}