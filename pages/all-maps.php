<?php
include '../header.php';
include '../footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <title>MCMaps | Minecraft Maps</title>

    <link rel="stylesheet" href="../css/map-cat/map-cat.css">
    <link rel="shortcut icon" type="image/jpg" href="img/site-icon.ico" />

    <script src="https://kit.fontawesome.com/9880171930.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php headerMod(); ?>
    <main>


        <section class="maps">
            <div class="label-long">
                <h3 class="label-long-title">ALL MAPS</h3>
            </div>

            <a class="map-preview-container" href="">
                <div class="map-preview">
                    <img src="/img/spot.jpg" alt="">
                    <div>
                        <p class="map-title">The Great Fall</p>
                        <p class="map-author map-date">by AmirKaka • 14 Nov, 2021</p>
                        <p class="map-description">Parkour around a beautiful waterfall in a new fast-paced parkour map
                            with 40 levels of medium difficulty parkour, Can you reach the top of the waterfall?</p>
                    </div>
                </div>
            </a>

            <a class="map-preview-container" href="">
                <div class="map-preview">
                    <img src="/img/spot.jpg" alt="">
                    <div>
                        <p class="map-title">The Great Fall</p>
                        <p class="map-author map-date">by AmirKaka • 14 Nov, 2021</p>
                        <p class="map-description">Parkour around a beautiful waterfall in a new fast-paced parkour map
                            with 40 levels of medium difficulty parkour, Can you reach the top of the waterfall?</p>
                    </div>
                </div>
            </a>

        </section>

    </main>
    <footer>
        <img src="/img/logo.png" alt="logo">
        <div class="footer-container">
            <div class="foot-nav">
                <a href="/index.html" class="nav-link">Latest</a>
                <a href="/pages/maps/all-maps.html" class="nav-link">All Maps</a>
                <a href="/pages/verified.html" class="nav-link">Verified</a>
                <a href="/pages/map-jam.html" class="nav-link">Map Jam</a>
                <a href="/pages/search.html" class="nav-link">Search</a>
                <span class="submenu-foot"><span class="nav-link">More <i class="fa fa-chevron-down"></i></span>
                    <span class="submenu-container-foot">
                        <a href="/pages/upload-a-map.html" class="nav-link nav-link-sub">Upload a Map</a>
                        <a href="/pages/update-a-map.html" class="nav-link nav-link-sub">Update a Map</a>
                    </span>
                </span>
            </div>

            <p>Join our Discord Server</p>
            <a href='https://discord.gg/EBQt3VrX' class="btn"><i class="fab fa-discord"></i><b> DISCORD</b></a>

            <p>Visit our Friends</p>
            <span class="referral-container">
                <a href="https://stickypiston.co/" class="referral">StickyPiston.co</a>
                <a href="https://www.mccreations.net/" class="referral">MCCreations.net</a>
                <a href="https://mccontent.net/" class="referral">MCContent.net</a>
            </span>

            <p class="disclaimer">
                <a href="https://www.minecraft.net/">Minecraft</a> was created by <a
                    href="https://www.minecraft.net/">Mojang AB</a>.
                <a href="https://www.mcmaps.net/">MCMaps.net</a> is not endorsed or affiliated with <a
                    href="https://www.minecraft.net/">Mojang AB</a>.
            </p>

        </div>
        <p class="copyright">© 2021 All Rights Reserved | <a href="https://www.mcmaps.net/">MCMaps.net</a></p>
    </footer>


    <script src="../js/nav.js" async></script>
</body>