<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);


?>

<html>
<head>
        <title>Now Were Cooking</title>
</head>
<body>

    <a href="/php/logout.php">Logout</a>
    <h1>This is the index page for Now were Cooking</h1>

    <br>
    Hello, <?php echo $user_data['user_name']; ?>
</body>
</html>
