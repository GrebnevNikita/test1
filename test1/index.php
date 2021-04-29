<?php
include 'functions.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Тз</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="favicon.png">
    <script src="jquery-3.4.1.min.js"></script>
    <script src="functions.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="content_main" class="flex">
    <div id="content_main_left"  class="flex">
        <?php
        get_affiliated_societies();
        ?>
    </div>
    <div id="content_main_right"  class="flex">

    </div>
</div>


</body>
</html>




