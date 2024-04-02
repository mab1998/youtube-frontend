<?php

            include('api.php');




?>

<!DOCTYPE html>
<html>
<head>
    <title>Youtube Transcript</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mx-auto">
        <div class="ml-64">
            <?php 
            include('sidebar.php');
            include('routing.php');  // Adjust if 'routing.php' is in a different location
            ?>

            <?php 
            $route = handleRoute();

            if (is_file($route)) {
                include($route);
            } else {
                echo $route;
            }
            ?>
        </div>
    </div>
</body>
</html>
