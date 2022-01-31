<?php
include 'functions_api.php';
$judge = $_POST["judge"];
$event = $_POST["event"];
$map_name = $_POST["map"];
$fun = $_POST["Fun"];
$des = $_POST["Design"];
$mech = $_POST["Mechanics"];
$impl = $_POST["imp"];
$creat = $_POST["Creativity"];



?>

<script>
fetch('http://mcmaps.great-site.net/_db/api/forms/submit/judgeReview?token=c68eab4604229ac0e49ab86729ac69', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json'
        },

        body: JSON.stringify({
            form: {
                "MapJamName": "<?php echo $event; ?>",
                "JudgeName": "<?php echo $judge; ?>",
                "MapName": "<?php echo $map_name; ?>",
                "Fun": "<?php echo $fun; ?>",
                "Design": "<?php echo $des; ?>",
                "Mechanics": "<?php echo $mech; ?>",
                "Implementation": "<?php echo $impl; ?>",
                "Creativity": "<?php echo $creat; ?>"
            }
        })
    })
    .then(res => res.json())
    .then(entry => console.log(entry));
</script>

<?php
/* header("Location: http://mcmaps.great-site.net");
die(); */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Submitted</title>
    <link rel="stylesheet" href="/css/forms/submissions.css">
</head>

<body>
    <h2>Thank you for Submitting</h2>
    <p>You may close this page now.</p>

    <style>
    h2,
    p {
        text-align: center;
        grid-column: 1/-1;
    }
    </style>
</body>

</html>