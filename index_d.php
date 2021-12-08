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

    // create & initialize a curl session
    $curl = curl_init();

    // set our url with curl_setopt()
    curl_setopt($curl, CURLOPT_URL, "http://localhost/Experiments/Cockpit/cockpit-master/api/collections/get/maps");

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

    $main_image = $data["entries"][0]["MainImage"]["path"];
    $img = $data["entries"][0]["Gallery"][0]["path"];
    $img2 = $data["entries"][0]["Gallery"][1]["path"];

    echo "<br> Map Name: " . $data["entries"][0]["MapName"];
    echo "<br> Map Author: " . $data["entries"][0]["Author"];
    echo "<br> Main Img (Path): " . $main_image;
    echo "<br> Download Map: " . $data["entries"][0]["MapDownload"];
    echo "<br> Download Resources: " . $data["entries"][0]["ServerResources"];
    echo "<br> Map Trailer: " . $data["entries"][0]["MapTrailer"];
    echo "<br> Map Info: " . $data["entries"][0]["MapInfo"];
    echo "<br> Player Amount: " . $data["entries"][0]["PlayerAmount"];
    echo "<br> Minecraft Version: " . $data["entries"][0]["MinecraftVersion"];
    echo "<br> Map Category: " . $data["entries"][0]["MapCategory"];
    echo "<br> Date Added: " . $data["entries"][0]["DateAdded"];
    echo "<br> File Size: " . $data["entries"][0]["MapFileSize"];
    echo "<br> Social: " . $data["entries"][0]["Social"];
    echo "<br> Gallery 1 of 2: <img src='/experiments/cockpit/" . $img . "' alt='imghere'>";
    echo "<br> Gallery 2 of 2: <img src='/experiments/cockpit/" . $img2 . "' alt='imghere'>";
    ?>

</body>

</html>