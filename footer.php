<?php

function footMod()
{
    echo '<footer>';
    echo '<img src="../img/logo.png" alt="logo">';
    echo '<div class="footer-container">';
    echo '<div class="foot-nav">';
    echo '<a href="/index.html" class="nav-link">Latest</a>';
    echo '<a href="/pages/maps/all-maps.html" class="nav-link">All Maps</a>';
    echo '<a href="/pages/verified.html" class="nav-link">Verified</a>';
    echo '<a href="/pages/map-jam.html" class="nav-link">Map Jam</a>';
    echo '<a href="/pages/search.html" class="nav-link">Search</a>';
    echo '<span class="submenu-foot"><span class="nav-link">More <i class="fa fa-chevron-down"></i></span>';
    echo '<span class="submenu-container-foot">';
    echo '<a href="/pages/upload-a-map.html" class="nav-link nav-link-sub">Upload a Map</a>';
    echo '<a href="/pages/update-a-map.html" class="nav-link nav-link-sub">Update a Map</a>';
    echo '</span>';
    echo '</span>';
    echo '</div>';
    echo '<p>Join our Discord Server</p>';
    echo '<a href="https://discord.gg/EBQt3VrX" class="btn"><i class="fab fa-discord"></i><b> DISCORD</b></a>';
    echo '<p>Visit our Friends</p>';
    echo '<span class="referral-container">';
    echo '<a href="https://stickypiston.co/" class="referral">StickyPiston.co</a>';
    echo '<a href="https://www.mccreations.net/" class="referral">MCCreations.net</a>';
    echo '<a href="https://mccontent.net/" class="referral">MCContent.net</a>';
    echo '</span>';

    echo '<p class="disclaimer">';
    echo '<a href="https://www.minecraft.net/">Minecraft</a> was created by <a href="https://www.minecraft.net/">Mojang AB</a>.';
    echo '<a href="https://www.mcmaps.net/">MCMaps.net</a> is not endorsed or affiliated with <a href="https://www.minecraft.net/">Mojang AB</a>.';
    echo '</p>';
    echo '</div>';
    echo '<p class="copyright">© 2021 All Rights Reserved | <a href="https://www.mcmaps.net/">MCMaps.net</a></p>';
    echo '</footer>';
}