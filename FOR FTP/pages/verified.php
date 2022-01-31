<?php
include '../header.php';
include '../footer.php';
include '../functions_api.php';

$prefix = "";

// Turn off all error reporting
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="McMaps Verified Map Makers. Play the best minecraft maps.">
    <meta name="keywords"
        content="Verified, Builders, Minecraft, Mincreaft Maps, Adventure, Minigames, Puzzle, PvP, MapJam, Mojang, Steve, McMaps, Maps">
    <meta name="author" content="KYODAI">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <title>MCMaps | Verified Builders</title>

    <link rel="stylesheet" href="../css/verified/verified.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/site-icon.ico" />
    <script src="https://kit.fontawesome.com/9880171930.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    headerMod();
    ?>


    <main>


        <section class="verified">
            <?php
            // create & initialize a curl session
            $curl = curl_init();
            // set our url with curl_setopt()
            curl_setopt($curl, CURLOPT_URL, $url . "_db/api/collections/get/verified");
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
            ?>

            <img class="ver-logo" src="../img/MCMaps+verified+mapmaker.png" alt="">
            <div class="label-long">
                <h3 class="label-long-title">VERIFIED MAP MAKERS</h3>
            </div>

            <?php
            while ($map_index < $arrayLength) {
                $name = $data["entries"][$map_index]["name"];
                $logo = $data["entries"][$map_index]["logo"]["path"];
                $link = $data["entries"][$map_index]["website"];
            ?>

            <div class="ver-build">
                <img src="../<?php echo $logo; ?>" alt="verified-logo">
                <p class="ver-name"><?php echo $name; ?></p>
                <a href="<?php // echo $link; 
                                ?>" class="ver-site">Visit Website</a>
            </div>
            <?php
                $map_index++;
            }
            ?>

        </section>
    </main>



    <?php
    footMod();
    ?>
    <script src="../js/nav.js" async></script>
</body>