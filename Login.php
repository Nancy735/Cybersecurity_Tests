<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'Config.php';
    $db = new PDO($dsn, $user, $password, $options);

    $name = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['pass']);
    $role = $_POST['role'];

    $sql = $db->prepare("SELECT * FROM student_data WHERE username=:usrname AND password=:pass AND role=:rol");
    $sql->execute(array(
        ':usrname' => $name,
        ':pass' => $password,
        ':rol' => $role
    ));

    $student_data = $sql->fetch(PDO::FETCH_ASSOC);

    if($student_data) {
        $_SESSION['username'] = $student_data['username'];
        $_SESSION['role'] = $student_data['role'];
        if ($_SESSION['role'] == 'admin') {
            header('Location: Admin.php');
            exit();
        } elseif ($_SESSION['role'] == 'user') {
            header('Location: User.php');
            exit();
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Login Form</title>
</head>
<body>
    <div>
        <h2>Login Into Your Account</h2>
        <form method="post">        

            <label for="username">Userame: </label>
            <input type="text" name="username" id="username" placeholder="Your name"
            value="<?php echo htmlspecialchars($_POST['username'] ?? ""); ?>" required>

            <label for="pass">Password: </label>
            <input type="password" name="pass" id="pass" placeholder="Enter a complex number" required>
            
            <label for="role">Role: </label>
            <input type="text" name="role" id="role" >

            <div>
            <input type="submit" value="Login">
            </div>
            
            <div>
            <a href="forgpass.php">Forgot Password?</a><br>
            </div>
            
        </form>
        <button onclick="window.location.href='Signup.php';">Create new account</button>
    </div>
</body>
</html>
