<?php
error_reporting(0); // HIDE ERRORS
require '../header.php';
require '../footer.php';
require '../functions_api.php';
$prefix = "../";
$name = $_GET['name'];
$query = str_replace(" ", "%20", $name);
// create & initialize a curl session
$curl = curl_init();

// set our url with curl_setopt()
curl_setopt($curl, CURLOPT_URL, $url . "_db/api/collections/get/maps?filter[MapName]=" . $query);

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
$map_download = $data["entries"][0]["MapDownload"];
$server = $data["entries"][0]["ServerResources"];
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


if ($g1 === "../") {
    $g1 = "";
} else if ($g2 === "../") {
    $g2 = "";
} else if ($g3 === "../") {
    $g3 = "";
} else if ($g4 === "../") {
    $g4 = "";
}


// Turn off all error reporting
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Play <?php echo $map_title; ?>.">
    <meta name="keywords"
        content="<?php $map_title; ?>Minecraft, Mincreaft Maps, Adventure, Minigames, Puzzle, PvP, MapJam, Mojang, Steve, McMaps, Maps">
    <meta name="author" content="KYODAI">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $map_title; ?></title>

    <link rel="stylesheet" href="../css/maps/maps.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/site-icon.ico" />
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
            <p class="label">DOWNLOADS</p>
            <a href="<?php echo $map_download; ?>" class="btn">Download Map <i class="fas fa-download"></i></a>
            <a href="<?php echo $server; ?>" class="btn">Server Resources <i class="fas fa-download"></i></a>
        </section>
        <section class="map-info">
            <?php
            if (isset($trailer)) {
            ?>

            <p class="label">MAP TRAILER</p>
            <iframe src="https://www.youtube.com/embed/<?php echo $trailer; ?>" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <?php
            }
            ?>

            <p class="label no-margin">MAP INFOMRATION</p>
            <div class="map-details">
                <?php
                echo $info;
                ?>
            </div>

            <div class="map-gallery">
                <p class="label">GALLERY</p>

                <div class="row">
                    <div class="column">
                        <img src="<?php echo $g1; ?>" style="width:100%" onclick="openModal();currentSlide(1)"
                            class="hover-shadow cursor">
                    </div>
                    <div class="column">
                        <img src="<?php echo $g2; ?>" style="width:100%" onclick="openModal();currentSlide(2)"
                            class="hover-shadow cursor">
                    </div>
                    <div class="column">
                        <img src="<?php echo $g3; ?>" style="width:100%" onclick="openModal();currentSlide(3)"
                            class="hover-shadow cursor">
                    </div>
                    <div class="column">
                        <img src="<?php echo $g4; ?>" style="width:100%" onclick="openModal();currentSlide(4)"
                            class="hover-shadow cursor">
                    </div>
                </div>
            </div>

            <div id="myModal" class="modal">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content">

                    <div class="mySlides">
                        <div class="numbertext">1 / 4</div>
                        <img src="<?php echo $g1; ?>" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">2 / 4</div>
                        <img src="<?php echo $g2; ?>" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">3 / 4</div>
                        <img src="<?php echo $g3; ?>" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">4 / 4</div>
                        <img src="<?php echo $g4; ?>" style="width:100%">
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    <div class="caption-container">
                        <p id="caption"></p>
                    </div>


                    <div class="column">
                        <img class="demo cursor" src="<?php echo $g1; ?>" style="width:100%" onclick="currentSlide(1)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="<?php echo $g2; ?>" style="width:100%" onclick="currentSlide(2)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="<?php echo $g3; ?>" style="width:100%" onclick="currentSlide(3)">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="<?php echo $g4; ?>" style="width:100%" onclick="currentSlide(4)">
                    </div>
                </div>
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

    <script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
    </script>
    <script src="../js/nav.js" async></script>
</body>

</html>