<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        <title>Forrgoten Password</title>
   </head>
   <body>
    <h3>Find Your Account</h3>
    <div>Please enter your email address or mobile number 
      to search for your account.
    </div>

    <form method="post">

    <label for="username">Username: </label>
    <input type="text" placeholder="Enter Username" name="username" required >

    <button type="submit">Search</button>
    <button onclick="window.location.href='Login.php';">Cancel</button>

    </form>
   </body>
</html>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'Config.php';
    $db = new PDO($dsn, $user, $password, $options);

    $username = htmlspecialchars($_POST['username']);

    $sql = $db->prepare("SELECT * FROM student_data WHERE username = :username");
    $sql->execute(array(':username' => $username));

    $user = $sql->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $password = $user['password'];
        echo "The password for username '$username' is: $password";
    } else {
        echo "User not found.";
    }
}
?>