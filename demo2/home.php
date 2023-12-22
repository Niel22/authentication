<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['fullname'])){
    $name = $_SESSION['fullname'];
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOME</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Hello, <?php echo $name; ?></h1>
        <a href="logout.php">Logout</a>
    </body>
    </html>
    <?php
}
else{
    header('location:index.php');
}
?>