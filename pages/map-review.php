<?php

include '../header.php';
include '../footer.php';
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

    <link rel="stylesheet" href="../css/map-cat/map-cat.css">
    <link rel="shortcut icon" type="image/jpg" href="img/site-icon.ico" />

    <script src="https://kit.fontawesome.com/9880171930.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php headerMod(); ?>
    <main>

        <section class="maps">
            <div class="label-long">
                <h3 class="label-long-title">MAPS FOR REVIEW</h3>
            </div>

            <?php
            // create & initialize a curl session
            $curl = curl_init();
            // set our url with curl_setopt()
            curl_setopt($curl, CURLOPT_URL, "http://localhost/_Projects/mcmaps-full/_db/api/collections/get/MapReview");
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
            $arrayLength = count($data["entries"],); // offset by 1 as arrays start at 0;
            $map_index = 0;


            while ($map_index < $arrayLength) {
                $main_image =  $prefix . $data["entries"][$map_index]["MainImage"]["path"];
                $map_title = $data["entries"][$map_index]["MapName"];
                $map_author = $data["entries"][$map_index]["Author"];
                $map_desc = $data["entries"][$map_index]["ShortDescription"];
                $map_date = date('d M, Y', $data["entries"][$map_index]["_created"]);
            ?>
            <a class="map-preview-container"
                href="<?php echo $prefix; ?>pages/map-review-details.php?name=<?php echo $map_title; ?>">
                <div class="map-preview">
                    <img src="<?php echo $main_image; ?>" alt="">
                    <div>
                        <p class="map-title"><?php echo $map_title; ?></p>
                        <p class="map-author map-date"><?php echo $map_author; ?> • <?php echo $map_date; ?></p>
                        <p class="map-description"><?php echo $map_desc; ?></p>
                    </div>
                </div>
            </a>
            <?php
                $map_index++;
            }
            ?>






        </section>

    </main>

    <?php footMod(); ?>


    <script src="../js/nav.js" async></script>
</body>