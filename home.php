<?php 
 session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <title>Home Page</title>
    </head>
    <body>
        <p>
            <h1>Home</h1>
            <h3>Hello <?php echo $_SESSION['username'] ;?>
             Let's make every visit to the website a special experience.<h3>
        </p>
        <a href="Logout.php">Log Out</a><br>
        <a href="Admin.php">User Data</a>
    </body>
</html>
