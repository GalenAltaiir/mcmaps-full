<?php
include '../functions_api.php';
$map_name = $_POST["MapName"];
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
fetch('http://mcmaps.great-site.net/_db/api/collections/save/mapupdate?token=c68eab4604229ac0e49ab86729ac69', {
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
echo "Update sent, you will be redirected within 5 seconds...";
header("Refresh: 3; URL=http://mcmaps.great-site.net/");
die();
?>