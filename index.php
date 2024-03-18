<?php

            include('api.php');




?>

<!DOCTYPE html>
<html>
<head>
    <title>My App</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
