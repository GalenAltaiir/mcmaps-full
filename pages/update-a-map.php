<?php
include '../header.php';
include '../footer.php';
include '../functions_api.php';

$prefix = "/_Projects/mcmaps-full/";
// Turn off all error reporting
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Update your Map on MCMaps.">
    <meta name="keywords"
        content="Minecraft, Mincreaft Maps, Adventure, Minigames, Puzzle, PvP, MapJam, Mojang, Steve, McMaps, Maps, Upload">
    <meta name="author" content="KYODAI">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <title>MCMaps | Update a Map</title>
    <link rel="shortcut icon" type="image/jpg" href="../img/site-icon.ico" />
    <link rel="stylesheet" href="../css/forms/forms.css">

    <script src="https://kit.fontawesome.com/9880171930.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php headerMod(); ?>
    <main>
        <section class="tos">
            <h1>UPDATE A MAP</h1>
            <h3>TERMS OF SERVICE (TOS)</h3>
            <ul>
                <li>Submit ONLY your Work</li>
                <li>Any edits to a map post should be sent through the 'update a map' form</li>
                <li>Maps submitted bill be re-hosted, unless requested by uploader</li>
                <li>Descriptions may be changed to fix grammatical errors and or to fit in size limited spaces</li>
                <li>If you don't upload images that conform to a near 16:9 ratio, your map may not be accepted</li>
                <li>Know that your submission could be denied, check your emails if so</li>
                <li>Fill out all information to have a higher chance of your map being accepted</li>
            </ul>
        </section>

        <section class="map-form">
            <form action="logic/update.php" method="POST" enctype="multipart/form-data">
                <h2> Submission Form </h2>
                <label for="MapName">Map Name <b>*</b></label>
                <input type="text" name="MapName" id="MapName" required>

                <label for="MCVer">Minecraft Version <b>*</b></label>
                <input type="text" name="MCVer" id="MCVer" required>

                <label for="MapVersion">Map Version <b>*</b></label>
                <input type="text" name="MapVersion" id="MapVersion" required>

                <label for="PlayerNum">Number of Players <b>*</b></label>
                <input type="text" name="PlayerNum" id="PlayerNum" required>


                <label for="Twitter">Twitter Handle</label>
                <input type="text" name="Twitter" id="Twitter">

                <label for="Email">Contact Email<b>*</b></label>
                <input type="text" name="Email" id="Email" required>

                <label for="DownloadLink">Download Link <b>*</b></label>
                <input type="text" name="DownloadLink" id="DownloadLink" required>


                <label for="ServerPack">Resource Pack (Server Resources)</label>
                <input type="text" name="ServerPack" id="ServerPack">

                <label for="ShortDesc">Short Map Description<b>*</b></label>
                <input type="text" name="ShortDesc" id="ShortDesc" required>

                <label for="LongDesc">Long Map Description<b>*</b></label>
                <input type="text" name="LongDesc" id="LongDesc" required>

                <label for="Trailer">YouTube Trailer</label>
                <input type="text" name="Trailer" id="Trailer">

                <label for="Guide">YouTube Walkthrough</label>
                <input type="text" name="Guide" id="Guide">

                <label for="MainPic">Main Map Image (URL)</label>
                <input type="url" name="MainPic" id="MainPic">

                <label for="Gallery1">Gallery Image #1 (URL)</label>
                <input type="url" name="Gallery1" id="Gallery1">

                <label for="Gallery2">Gallery Image #2 (URL)</label>
                <input type="url" name="Gallery2" id="Gallery2">

                <label for="Gallery3">Gallery Image #3 (URL)</label>
                <input type="url" name="Gallery3" id="Gallery3">

                <label for="Gallery4">Gallery Image #4 (URL)</label>
                <input type="url" name="Gallery4" id="Gallery4">

                <label for="Changelog">Changelog</label>
                <input type="text" name="Changelog" id="Changelog">

                <input type="checkbox" name="agreement" id="agreement" required>
                <label for="agreement">By checking, I agree to the map submission TOS listed above this form.</label>
                <input type="submit">
            </form>
        </section>
    </main>
    <?php footMod(); ?>
    <script src="../js/nav.js" async></script>
</body>

</html>