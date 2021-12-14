<?php
include '../header.php';
include '../footer.php';
include '../functions_api.php';

$prefix = "/_Projects/mcmaps-full/";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <title>MCMaps | Minecraft Maps</title>
    <link rel="shortcut icon" type="image/jpg" href="/img/site-icon.ico" />
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
            <form action="logic/update.php" method="$_POST">
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

                <label for="MainPic">Main Map Image (Upload)<b>*</b></label>
                <input type="file" name="MainPic" id="MainPic" required>

                <label for="Gallery1">Gallery Image #1<b>*</b></label>
                <input type="file" name="Gallery1" id="Gallery1" required>

                <label for="Gallery2">Gallery Image #2<b>*</b></label>
                <input type="file" name="Gallery2" id="Gallery2" required>

                <label for="Gallery3">Gallery Image #3<b>*</b></label>
                <input type="file" name="Gallery3" id="Gallery3" required>

                <label for="Gallery4">Gallery Image #4<b>*</b></label>
                <input type="file" name="Gallery4" id="Gallery4" required>

                <label for="Changelog">Changelog</label>
                <textarea type="text" name="Changelog" id="Changelog">

                </textarea>

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