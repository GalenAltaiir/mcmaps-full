<?php
echo $map_name = $_POST["MapName"];
$version = $_POST["MCVer"];
$players = $_POST["PlayerNum"];
$twitter = $_POST["Twitter"];
$email = $_POST["Email"];
$download = $_POST["DownloadLink"];
$server = $_POST["ServerPack"];
$short_desc = $_POST["ShortDesc"];
$long_desc = $_POST["LongDesc"];
$trailer = $_POST["Trailer"];
$guide = $_POST["Guide"];
$email = $_POST["Email"];
$img_main = $_POST["MainPic"];
$img1 = $_POST["Gallery1"];
$img2 = $_POST["Gallery2"];
$img3 = $_POST["Gallery3"];
$img4 = $_POST["Gallery4"];

$map_ver = $_POST["MapVersion"];
$changes = $_POST["Changelog"];

?>



<script>
fetch('/_Projects/mcmaps-full/_db/api/collections/save/mapupdate?token=3bc3e2940425ec328e83a9e54500fb', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            data: {
                "MapName": "<?php echo $map_name; ?>",
                "MainImage": "<?php echo $img_main; ?>",
                "MapDownload": "<?php echo $download; ?>",
                "ServerResources": "<?php echo $server; ?>",
                "Contact": "<?php echo $email; ?>",
                "MapTrailer": "<?php echo $trailer; ?>",
                "MapInfo": "<?php echo $long_desc; ?>",
                "ShortDescription": "<?php echo $short_desc; ?>",
                "PlayerAmount": "<?php echo $players; ?>",
                "MinecraftVersion": "<?php echo $version; ?>",
                "Social": "<?php echo $twitter; ?>",
                "Image1": "<?php echo $img1; ?>",
                "Image2": "<?php echo $img2; ?>",
                "Image3": "<?php echo $img3; ?>",
                "Image4": "<?php echo $img4; ?>",
                "MapVersion": "<?php echo $map_ver; ?>",
                "Changelog": "<?php echo $changes; ?>",


            }
        })
    })
    .then(res => res.json())
    .then(entry => console.log(entry));
</script>

<?php
header("Location: http://localhost/_Projects/mcmaps-full/");
die();
?>