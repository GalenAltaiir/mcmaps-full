<?php
require 'functions_api.php';
$prefix = "";
// Turn off all error reporting
/* error_reporting(0); */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description"
        content="Download and Play Various Minecraft Maps. Solve puzzles, cross difficult jumps, create your own adventures.">
    <meta name="keywords"
        content="Minecraft, Mincreaft Maps, Adventure, Minigames, Puzzle, PvP, MapJam, Mojang, Steve, McMaps, Maps">
    <meta name="author" content="KYODAI">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <title>MCMaps | Minecraft Maps</title>
    <link rel="shortcut icon" type="image/jpg" href="img/site-icon.ico" />
    <link rel="stylesheet" href="css/index/index.css">

    <script src="https://kit.fontawesome.com/9880171930.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <a href="<?php echo $prefix; ?>index" class="nav-logo"><img src="img/logo.png" alt="logo"></a>
        <nav class="navbar">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?php echo $prefix; ?>index" class="nav-link">Latest </a>
                </li>
                <li class="nav-item">
                    <span class="nav-link">
                        Map Categories <i class="fa fa-chevron-down"></i>
                        <span class="dropdown">
                            <a href="<?php echo $prefix; ?>all" class="nav-link">All Maps</a>
                            <a href="<?php echo $prefix; ?>all?Category=Puzzle" class="nav-link">Puzzle</a>
                            <a href="<?php echo $prefix; ?>all?Category=Parkour" class="nav-link">Parkour</a>
                            <a href="<?php echo $prefix; ?>all?Category=Minigames" class="nav-link">Minigames</a>
                            <a href="<?php echo $prefix; ?>all?Category=Maze" class="nav-link">Maze</a>
                            <a href="<?php echo $prefix; ?>all?Category=PvP" class="nav-link">PvP</a>
                            <a href="<?php echo $prefix; ?>all?Category=Horror" class="nav-link">Horror</a>
                            <a href="<?php echo $prefix; ?>all?Category=Other" class="nav-link">Other</a>
                        </span>
                    </span>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $prefix; ?>events" class="nav-link">Map Jam</a>
                </li>
                <li class="nav-item">
                    <a href="verified" class="nav-link">Verified</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link">
                        Other <i class="fa fa-chevron-down"></i>
                        <span class="dropdown">
                            <a href="upload-a-map" class="nav-link">Upload a Map</a>
                            <a href="update-a-map" class="nav-link">Update a Map</a>
                        </span>
                    </span>
                </li>
                <li class="nav-item">
                    <a href="search" class="nav-link">Search</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <main>
        <!-- SPOTLIGHT SECTION - FETCH THE CURRENT SPOTLIGHT MAP -->
        <?php
        $id =  getSpotlightId();


        // create & initialize a curl session
        $curl = curl_init();

        // set our url with curl_setopt()
        curl_setopt($curl, CURLOPT_URL, $url . "_db/api/collections/get/maps");

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
        // ARRAY SETTING
        $arrayLength = count($data["entries"]); // offset by 1 as arrays start at 0;
        $i = 0;
        while ($i < $arrayLength) {
            $fetched_id = $data["entries"][$i]["_id"];
            if ($fetched_id == $id) {
                $main_image = $data["entries"][$i]["MainImage"]["path"];
                $spot_name = $data["entries"][$i]["MapName"];
                $spot_author = $data["entries"][$i]["Author"];
                $spot_desc = $data["entries"][$i]["ShortDescription"];
                $spot_updated = $data["entries"][$i]["_modified"];
                $spot_name_url = str_replace(" ", "-", $spot_name);
            }
            $i++;
        }
        ?>
        <section class="spotlight">
            <a href="maps/<?php echo $spot_name_url; ?>" class="cover-link"></a>
            <div class="spot-image">
                <img src='<?php echo $main_image; ?>' alt="spotlight-image">
                <h2 class="label">SPOTLIGHT</h2>
            </div>

            <p class="spot-title"><?php echo $spot_name; ?></p>
            <p class="spot-author"><?php echo date('d M, Y', $spot_updated)  . " • " . $spot_author; ?></p>
            <p class="spot-description"><?php echo $spot_desc; ?></p>
        </section>

        <?php
        // create & initialize a curl session
        $curl = curl_init();
        // set our url with curl_setopt()
        curl_setopt($curl, CURLOPT_URL, $url . "_db/api/collections/get/maps");
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
        // ARRAY SETTING
        $arrayLength = count($data["entries"]); // offset by 1 as arrays start at 0;
        $map_index = 0;

        $creation_time = array();
        // PUT ALL THE CREATION TIMES INTO A SEPERATE ARRAY
        while ($map_index < $arrayLength) {
            $map_creation = $data["entries"][$map_index]["_created"];
            /* echo "- created at: " . date('G:i A', $map_creation) . "<br>"; */
            array_push($creation_time, $map_creation);
            $map_index++;
        }

        rsort($creation_time); // SORT TO SHOW MOST RECENT FIRST

        $map_index = 0; // reset index
        // PRINT ARRAY MATCHING SORTED CREATION TIME
        ?> <section class="latest-maps">
            <div class="label-long">
                <h3 class="label-long-title">LATEST MAPS</h3>
            </div>

            <?php
            while ($map_index < 9) {
                for ($i = 0; $i < $arrayLength; $i++) {
                    if ($data["entries"][$i]["_created"] === $creation_time[$map_index]) {
                        $map_main_img = $prefix . $data["entries"][$i]["MainImage"]["path"];
                        $map_title = $data["entries"][$i]["MapName"];
                        $map_url = str_replace(" ", "-", $map_title);

            ?>
            <a class="map-preview-container" href="maps/<?php echo $map_url; ?>">
                <div class="map-preview">
                    <img src="<?php echo $map_main_img; ?>" alt="map-image">
                    <div>
                        <p class="map-title"><?php echo $data["entries"][$i]["MapName"]; ?></p>
                        <p class="map-author map-date">
                            <?php echo $data["entries"][$i]["Author"] . " • " . date('d M, Y', $data["entries"][$i]["_created"]); ?>
                        </p>
                        <p class="map-description"><?php echo $data["entries"][$i]["ShortDescription"]; ?></p>
                    </div>
                </div>
            </a>
            <?php
                    }
                }
                $map_index++;
            }
            ?>

        </section>

        <?php
        // create & initialize a curl session
        $curl = curl_init();
        // set our url with curl_setopt()
        curl_setopt($curl, CURLOPT_URL, $url . "_db/api/collections/get/maps");
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
        // ARRAY SETTING
        $arrayLength = count($data["entries"]); // offset by 1 as arrays start at 0;
        $map_index = 0;

        $updated_time = array();
        // PUT ALL THE CREATION TIMES INTO A SEPERATE ARRAY
        while ($map_index < $arrayLength) {
            $map_update = $data["entries"][$map_index]["_modified"];
            /* echo "- created at: " . date('G:i A', $map_creation) . "<br>"; */
            array_push($updated_time, $map_update);
            $map_index++;
        }

        rsort($updated_time); // SORT TO SHOW MOST RECENT FIRST

        $map_index = 0; // reset index
        // PRINT ARRAY MATCHING SORTED CREATION TIME
        ?> <section class="updated-maps">
            <div class="label-long">
                <h3 class="label-long-title">RECENTLY UPDATED</h3>
            </div>

            <?php
            while ($map_index < 6) {
                for ($i = 0; $i < $arrayLength; $i++) {
                    if ($data["entries"][$i]["_modified"] === $updated_time[$map_index]) {
                        $map_main_img = $prefix . $data["entries"][$i]["MainImage"]["path"];
                        $map_title = $data["entries"][$i]["MapName"];
                        $map_url = str_replace(" ", "-", $map_title);
            ?>
            <a class="map-preview-container" href="maps/<?php echo $map_url; ?>">
                <div class="map-preview">
                    <img src="<?php echo $map_main_img; ?>" alt="map-image">
                    <div>
                        <p class="map-title"><?php echo $data["entries"][$i]["MapName"]; ?></p>
                        <p class="map-author map-date">
                            <?php echo $data["entries"][$i]["Author"] . " • " . date('d M, Y', $data["entries"][$i]["_created"]); ?>
                        </p>
                        <p class="map-description"><?php echo $data["entries"][$i]["ShortDescription"]; ?></p>
                    </div>
                </div>
            </a>
            <?php
                    }
                }
                $map_index++;
            }
            ?>

        </section>



    </main>

    <footer>
        <img src="img/logo.png" alt="logo">
        <div class="footer-container">
            <div class="foot-nav">
                <a href="index" class="nav-link">Latest</a>
                <a href="all" class="nav-link">All Maps</a>
                <a href="verified" class="nav-link">Verified</a>
                <a href="events" class="nav-link">Map Jam</a>
                <a href="search" class="nav-link">Search</a>
                <span class="submenu-foot"><span class="nav-link">More <i class="fa fa-chevron-down"></i></span>
                    <span class="submenu-container-foot">
                        <a href="upload-a-map" class="nav-link nav-link-sub">Upload a Map</a>
                        <a href="update-a-map" class="nav-link nav-link-sub">Update a Map</a>
                        <a href="logos-and-guidelines" class="nav-link nav-link-sub">Logos and Guidelines</a>
                    </span>
                </span>
            </div>

            <p>Join our Discord Server</p>
            <a href='https://discord.gg/EBQt3VrX' target="_blank" class="btn"><i class="fab fa-discord"></i><b>
                    DISCORD</b></a>

            <p>Visit our Friends</p>
            <span class="referral-container">
                <a href="https://stickypiston.co/" target="_blank" class="referral">StickyPiston.co</a>
                <a href="https://www.mccreations.net/" target="_blank" class="referral">MCCreations.net</a>
                <a href="https://mccontent.net/" target="_blank" class="referral">MCContent.net</a>
            </span>

            <p class="disclaimer">
                <a href="https://www.minecraft.net/" target="_blank">Minecraft</a> was created by <a
                    href="https://www.minecraft.net/" target="_blank">Mojang AB</a>.
                <a href="https://www.mcmaps.net/" target="_blank">MCMaps.net</a> is not endorsed or affiliated with <a
                    href="https://www.minecraft.net/" target="_blank">Mojang AB</a>.
            </p>

        </div>
        <p class="copyright">© 2021 All Rights Reserved | <a href="https://www.mcmaps.net/"
                target="_blank">MCMaps.net</a></p>
    </footer>
    <script src="js/nav.js" async></script>
</body>

</html>