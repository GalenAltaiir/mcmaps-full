<?php
$url = "http://mcmaps.great-site.net/";

function getSpotlightId()
{
    $url = "http://mcmaps.great-site.net/";

    // create & initialize a curl session
    $curl = curl_init();

    // set our url with curl_setopt()
    curl_setopt($curl, CURLOPT_URL, $url . "_db/api/singletons/get/SpotlightMap?token=c68eab4604229ac0e49ab86729ac69");

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
    $url = "http://mcmaps.great-site.net/";
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

    return $data["CurrentEvent"]["_id"];
}