<?php
function getSpotlightId()
{

    // create & initialize a curl session
    $curl = curl_init();

    // set our url with curl_setopt()
    curl_setopt($curl, CURLOPT_URL, "http://localhost/_Projects/mcmaps-full/_db/api/singletons/get/SpotlightMap?token=3bc3e2940425ec328e83a9e54500fb");

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
    return $data["Map"]["_id"];
}

function getCurrentEvent()
{
    // create & initialize a curl session
    $curl = curl_init();
    // set our url with curl_setopt()
    curl_setopt($curl, CURLOPT_URL, "http://localhost/_Projects/mcmaps-full/_db/api/singletons/get/ActiveEvent?token=3bc3e2940425ec328e83a9e54500fb");
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

    return $data["CurrentEvent"]["_id"];
}