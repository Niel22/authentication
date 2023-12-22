<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php
        if(isset($_GET['error'])){
        ?>
            <p class='error'><?php echo $_GET['error'];?></p>
        <?php } ?>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="email"><br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="password"><br>

        <button type="submit">Login</button>
        New User? <a href="register.html">Register Here</a>
    </form>
</body>
</html>