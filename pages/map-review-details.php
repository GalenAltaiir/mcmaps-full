<?php
error_reporting(0); // HIDE ERRORS
require '../header.php';
require '../footer.php';
$prefix = "/_Projects/mcmaps-full/";
$name = $_GET['name'];
$query = str_replace(" ", "%20", $name);
// create & initialize a curl session
$curl = curl_init();

// set our url with curl_setopt()
curl_setopt($curl, CURLOPT_URL, "http://localhost/_Projects/mcmaps-full/_db/api/collections/get/MapReview?filter[MapName]=" . $query);

// return the transfer as a string, also with setopt()
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// curl_exec() executes the started curl session
// $output contains the output string
$output = curl_exec($curl);

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
curl_close($curl);
/* var_dump(json_decode($output, true)); */

$data = json_decode($output, true);

$main_image =  $prefix . $data["entries"][0]["MainImage"]["path"];
$map_title = $data["entries"][0]["MapName"];
$map_author = $data["entries"][0]["Author"];
$map_download = "../" . $data["entries"][0]["MapDownload"];
$server = "../" . $data["entries"][0]["ServerResources"];
//EMBED URL
$trailer = $data["entries"][0]["MapTrailer"];
parse_str(parse_url($trailer, PHP_URL_QUERY), $my_array_of_vars);
$trailer = $my_array_of_vars['v'];
// Output: C4kxS1ksqtw
// ---------------------------------------
$info = $data["entries"][0]["MapInfo"];
$players = $data["entries"][0]["PlayerAmount"];
$version = $data["entries"][0]["MinecraftVersion"];
$category = $data["entries"][0]["MapCategory"];
$size = $data["entries"][0]["MapFileSize"];
$date_raw = $data["entries"][0]["_created"];
$date = date('d M, Y', $date_raw);
$social = $data["entries"][0]["Social"];


$g1 = $prefix . $data["entries"][0]["Gallery"][0]["path"];
$g2 = $prefix . $data["entries"][0]["Gallery"][1]["path"];
$g3 = $prefix . $data["entries"][0]["Gallery"][2]["path"];
$g4 = $prefix . $data["entries"][0]["Gallery"][3]["path"];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- REPLACE TITLE -->
    <title>MAPNAME</title>
    <!-- REPLACE TITLE -->

    <link rel="stylesheet" href="../css/maps/maps.css">
    <script src="https://kit.fontawesome.com/9880171930.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php headerMod(); ?>

    <main class="map-container">
        <div class="header-content">
            <img src="<?php echo $main_image; ?>" alt="">
            <h1><?php echo $map_title; ?></h1>
            <p><?php echo $map_author; ?></p>
        </div>


        <section class="map-downloads">
            <p class="label">RESOURCES</p>
            <a href="../_db/" target="_blank" class="btn btn-primary">Go To Cockpit Dashboard</a>
            <a href="<?php echo $map_download; ?>" class="btn">Download Map <i class="fas fa-download"></i></a>
            <a href="<?php echo $server; ?>" class="btn">Server Resources <i class="fas fa-download"></i></a>
        </section>

        <section class="map-info">
            <p class="label">MAP TRAILER</p>
            <iframe src="https://www.youtube.com/embed/<?php echo $trailer; ?>" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>

            <p class="label no-margin">MAP INFOMRATION</p>
            <div class="map-details">
                <?php
                echo $info;
                ?>
            </div>

            <div class="map-gallery">
                <p class="label">GALLERY</p>
                <img src="<?php echo $g1; ?>" alt="">
                <img src="<?php echo $g2; ?>" alt="">
                <img src="<?php echo $g3; ?>" alt="">
                <img src="<?php echo $g4; ?>" alt="">

            </div>


        </section>
        <section class="additional-details">
            <p class="label">MAP DETAILS</p>

            <div class="info">
                <p><b>PLAYER AMOUNT</b></p>
                <p><?php echo $players; ?></p>
            </div>

            <div class="info">
                <p><b>MINECRAFT VERSION</b></p>
                <p><?php echo $version; ?></p>
            </div>

            <div class="info">
                <p><b>MAP FILE SIZE</b></p>
                <p><?php echo $size; ?></p>
            </div>

            <div class="info">
                <p><b>MAP CATEGORY</b></p>
                <p><?php echo $category; ?></p>
            </div>

            <div class="info">
                <p><b>DATE ADDED</b></p>
                <p><?php echo $date; ?></p>
            </div>

            <div class="info">
                <p><b>CREATOR</b></p>
                <p><?php echo $map_author; ?></p>
            </div>

            <?php
            if (!empty($social)) {
            ?>
            <div class="info">
                <p><b>TWITTER</b></p>
                <p><?php echo $social; ?></p>

            </div>
            <?php
            }
            ?>
        </section>
    </main>
    <?php
    footMod();
    ?>

    <script src="../js/nav.js" async></script>
</body>

</html>