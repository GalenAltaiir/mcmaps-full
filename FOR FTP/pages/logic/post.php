<?php
include '../functions_api.php';

$map_name = $_POST["MapName"];
$version = $_POST["MCVer"];
$author = $_POST["MapAuthor"];
$players = $_POST["PlayerNum"];
$genre = $_POST["MapGenre"];
$twitter = $_POST["Twitter"];
$email = $_POST["Email"];
$download = $_POST["DownloadLink"];
$server = $_POST["ServerPack"];
$short_desc = $_POST["ShortDesc"];
$long_desc = $_POST["LongDesc"];
$trailer = $_POST["Trailer"];
$guide = $_POST["Guide"];
$email = $_POST["Email"];
$size =  $_POST["MapSize"];

$image = array(
    $_FILES["MainPic"],
    $_FILES["Gallery1"],
    $_FILES["Gallery2"],
    $_FILES["Gallery3"],
    $_FILES["Gallery4"]
);

// IMAGE UPLOAD
$i = 0;
while ($i < 5) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image[$i]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($image[$i]["tmp_name"]);
        if ($check !== false) {
            echo "<br> File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "<br> File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($image[$i]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($image[$i]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $i++;
}
?>

<script>
fetch('http://mcmaps.great-site.net/_db/api/collections/save/MapReview', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            data: {
                "MapName": "<?php echo $map_name; ?>",
                "Author": "<?php echo $author; ?>",
                "MainImage": {
                    "path": "<?php echo "pages/logic/uploads/" . $image[0]["name"]; ?>"
                },
                "MapDownload": "<?php echo $download; ?>",
                "ServerResources": "<?php echo $server; ?>",
                "MapTrailer": "<?php echo $trailer; ?>",
                "MapInfo": "<?php echo $long_desc; ?>",
                "ShortDescription": "<?php echo $short_desc; ?>",
                "PlayerAmount": "<?php echo $players; ?>",
                "MinecraftVersion": "<?php echo $version; ?>",
                "MapCategory": "<?php echo $genre; ?>",
                "MapFileSize": "<?php echo $size; ?>",
                "Social": "<?php echo $twitter; ?>",
                "Gallery": [{
                        "path": "<?php echo "pages/logic/uploads/" . $image[1]["name"]; ?>"
                    },
                    {
                        "path": "<?php echo "pages/logic/uploads/" . $image[2]["name"]; ?>"
                    },
                    {
                        "path": "<?php echo "pages/logic/uploads/" . $image[3]["name"]; ?>"
                    },
                    {
                        "path": "<?php echo "pages/logic/uploads/" . $image[4]["name"]; ?>"
                    },

                ],
                "Email": "<?php echo $email; ?>"
            }
        })
    })
    .then(res => res.json())
    .then(entry => console.log(entry));
</script>

<?php
header("Location: http://mcmaps.great-site.net");
die();
?>