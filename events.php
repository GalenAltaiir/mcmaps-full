<?php
include 'header.php';
include 'footer.php';
include 'functions_api.php';

$prefix = "";
// Turn off all error reporting
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="View ongoing events at MCMaps, participate and win prizes!">
    <meta name="keywords"
        content="Events, Minecraft, Mincreaft Maps, Adventure, Minigames, Puzzle, PvP, MapJam, Mojang, Steve, McMaps, Maps">
    <meta name="author" content="KYODAI">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <title>MCMaps | Map Jams</title>

    <link rel="stylesheet" href="../css/mapjam/map-jam.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/site-icon.ico" />

    <script src="https://kit.fontawesome.com/9880171930.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php headerMod(); ?>


    <main>
        <?php
        $ongoing_id = getCurrentEvent();
        // create & initialize a curl session
        $curl = curl_init();

        // set our url with curl_setopt()
        curl_setopt($curl, CURLOPT_URL, $url . "_db/api/collections/get/MapJam?token=c68eab4604229ac0e49ab86729ac69");

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
            if ($fetched_id == $ongoing_id) {
                $e_name = $data["entries"][$i]["EventName"];
                $e_img = $data["entries"][$i]["EventImage"]["path"];
                $e_sDate = $data["entries"][$i]["StartDate"];
                $e_eDate = $data["entries"][$i]["EndDate"];
                $judge1 = $data["entries"][$i]["Judge1"];
                $judge2 = $data["entries"][$i]["Judge2"];
                $judge3 = $data["entries"][$i]["Judge3"];
                $judge4 = $data["entries"][$i]["Judge4"];
                $judge5 = $data["entries"][$i]["Judge5"];
                $prizes = $data["entries"][$i]["Prizes"];
                $winner = $data["entries"][$i]["Winner"];
                $winner_map = $data["entries"][$i]["WinnerMap"];
                $map_download = $data["entries"][$i]["MapDownload"];

                $newDateStart = date("jS F Y", strtotime($e_sDate));
                $newDateEnd = date("jS F Y", strtotime($e_eDate));
        ?>

        <section class="event-container">
            <img src="../<?php echo $e_img; ?>" alt="MapJam Logo">
            <h2><?php echo $e_name; ?></h2>
            <div class="event-date">
                <p><i class="fas fa-calendar-alt"></i> DATE</p>
                <p><?php echo $newDateStart; ?> - <?php echo $newDateEnd; ?></p>
            </div>

            <div class="event-subcontainer">
                <div class="event-judges">
                    <p><i class="fas fa-gavel"></i> JUDGES</p>
                    <ul>
                        <li><?php echo $judge1; ?></li>
                        <li><?php echo $judge2; ?></li>
                        <li><?php echo $judge3; ?></li>
                        <li><?php echo $judge4; ?></li>
                        <li><?php echo $judge5; ?></li>
                    </ul>
                </div>

                <div class="event-prizes">
                    <p><i class="fas fa-gifts"></i> PRIZES</p>
                    <ul>
                        <li><?php echo $prizes; ?></li>
                    </ul>
                </div>
            </div>

            <div class="event-info">
                <p><i class="fas fa-book-reader"></i> RULES AND INFORMATION</p>
                <p>Rules are reconsidered before the jam starts. all information you need for the jam will be in an
                    information channel on the Official MCMaps.net Discord Server.</p>
            </div>

            <div class="event-apply">
                <p><i class="fas fa-user-plus"></i> HOW TO SIGN UP?</p>
                <div class="apply-details">
                    <p>You can sign up by showing your interest on the Discord Event.</p>
                    <a href="https://discord.com/invite/mcmaps" class="btn"><i class="fab fa-discord"></i> DISCORD</a>
                </div>
            </div>
        </section>

        <?php
            }
            $i++;
        }

        $curl = curl_init();

        // set our url with curl_setopt()
        curl_setopt($curl, CURLOPT_URL, $url . "_db/api/collections/get/MapJam?token=c68eab4604229ac0e49ab86729ac69");

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
            if ($fetched_id !== $ongoing_id) {
                $e_name = $data["entries"][$i]["EventName"];
                $e_img = $data["entries"][$i]["EventImage"]["path"];
                $winner = $data["entries"][$i]["Winner"];
                $winner_map = $data["entries"][$i]["WinnerMap"];
                $map_download = $data["entries"][$i]["MapDownload"];

            ?>
        <section class="event-container">
            <img src="../<?php echo $e_img; ?>" alt="MapJam Logo">
            <h2><?php echo $e_name; ?></h2>
            <p class="event-winner">Congratulations to: <b><?php echo $winner; ?></b> for their winning map</p>
            <h2 class="event-winner-map"><?php echo $winner_map; ?></h2>
            <a href="<?php echo $prefix . $map_download; ?>" class="btn event-map-download"><i
                    class="fas fa-download"></i>
                Download <?php echo $winner_map; ?>
            </a>
        </section>
        <?php
            }

            $i++;
        }

        ?>




    </main>

    <?php
    footMod();
    ?>
    <script src="../js/nav.js" async></script>
</body>