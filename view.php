<?php
session_start();
if ( ! isset($_SESSION['username']) ) {
  die('Not logged in');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Izuchukwu Desmond Odilinye</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php 
    if ( isset($_SESSION["success"]) ) {
        echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");
        unset($_SESSION["success"]);
    } ?> 
    <?php
if ( isset($_SESSION['username']) ) {
    echo "<p>Welcome: ";
    echo htmlentities($_SESSION['username']);
    echo "</p>\n";
}

?>
<h1>Tracking Autos for <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="dfbcacbaa99faab2b6bcb7f1babbaa">[email&#160;protected]</a></h1>
<h2>Automobiles</h2>
<ul>
<p>
</ul>
<p>
<a href="add.php">Add New (case matters)</a> |
<a href="logout.php">Logout</a>
</p>

    <a href="add.php">Add New (case matters)</a>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
</html>
