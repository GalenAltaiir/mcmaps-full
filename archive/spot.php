<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    INDEX PAGE<br>

    <?php
    require 'functions_api.php';
    $id =  getSpotlightId();


    // create & initialize a curl session
    $curl = curl_init();

    // set our url with curl_setopt()
    curl_setopt($curl, CURLOPT_URL, "http://localhost/_Projects/mcmaps-full/cockpit-master/api/collections/get/maps");

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

    echo "<br>";
    echo "<br>";
    // ARRAY SETTING
    $arrayLength = count($data["entries"]); // offset by 1 as arrays start at 0;
    $i = 0;
    while ($i < $arrayLength) {
        $fetched_id = $data["entries"][$i]["_id"];
        if ($fetched_id == $id) {
            echo "<br> Map Name: " . $data["entries"][$i]["MapName"];
            echo "<br> Map Author: " . $data["entries"][$i]["Author"];
            echo "<br> Download Map: " . $data["entries"][$i]["MapDownload"];
            echo "<br> Download Resources: " . $data["entries"][$i]["ServerResources"];
            echo "<br> Map Trailer: " . $data["entries"][$i]["MapTrailer"];
            echo "<br> Map Info: " . $data["entries"][$i]["MapInfo"];
            echo "<br> Player Amount: " . $data["entries"][$i]["PlayerAmount"];
            echo "<br> Minecraft Version: " . $data["entries"][$i]["MinecraftVersion"];
            echo "<br> Map Category: " . $data["entries"][$i]["MapCategory"];
            echo "<br> Date Added: " . $data["entries"][$i]["DateAdded"];
            echo "<br> File Size: " . $data["entries"][$i]["MapFileSize"];
            echo "<br> Social: " . $data["entries"][$i]["Social"];
        }
        $i++;
    }




    ?>

</body>

</html>