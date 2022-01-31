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

    <link rel="stylesheet" href="../css/forms/submissions.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/site-icon.ico" />

    <script src="https://kit.fontawesome.com/9880171930.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php headerMod();
    $currentJamID = getCurrentEvent();

    global $url;
    // $url = "http://mcmaps.great-site.net/";

    // create & initialize a curl session
    $curl = curl_init();
    // set our url with curl_setopt()
    curl_setopt($curl, CURLOPT_URL, $url . "_db/api/singletons/get/ActiveEvent?token=c68eab4604229ac0e49ab86729ac69");
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

    $currentEvent = $data["CurrentEvent"]["display"];
    ?>

    <main>

        <section class="form-container">
            <h2 class="label">Judge Submission Form</h2>
            <form action="sf-logic.php" method="post">
                <label for="event">Current Event</label>
                <input type="text" " disabled value=" <?php echo $currentEvent; ?>">
                <input type="text" name="event" hidden value="<?php echo $currentEvent; ?>">

                <label for="judge">Judge Name</label>
                <input name="judge" type="text" placeholder="Judge Name" required>
                <label for="map">Map Name</label>
                <input name="map" type="text" placeholder="Map Name" required>
                <label for="Fun">Fun</label>
                <select name="Fun">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <label for="Design">Design</label>
                <select name="Design">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <label for="Mechanics">Mechanics</label>
                <select name="Mechanics">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <label for="imp">Implementation</label>
                <select name="imp">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <label for="Creativity">Creativity</label>
                <select name="Creativity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <textarea name="feedback" cols="30" rows="10"></textarea>

                <input type="submit" value="Submit Feedback">
            </form>
        </section>

    </main>

    <?php
    footMod();
    ?>
    <script src="../js/nav.js" async></script>
</body>