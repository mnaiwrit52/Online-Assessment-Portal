<?php

session_start();
if(!isset($_SESSION['name'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['name'];?></h1><br>
    <a href="logout.php">Logout</a>
</body>
</html>