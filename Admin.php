<?php 
require_once 'Config.php';
$db = new PDO($dsn,$user,$password,$options);
$sql = "SELECT * FROM student_data";
$result = $db->query($sql);
$result = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
        <meta name="description" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <body>
        <table>
            <h1>User Data</h1>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $student_data) {
                    echo "<tr>";
                    echo "<td>" .  htmlspecialchars($student_data['username']) . "</td>";
                    echo "<td>" .  htmlspecialchars($student_data['password']) . "</td>";
                    echo "<td>" .  htmlspecialchars($student_data['user_id']). "</td>";
                    echo "<td>" .  htmlspecialchars($student_data['email']) . "</td>";
                    echo "<td>" .  htmlspecialchars($student_data['role']) . "</td>";
                    echo "<td><a href='Update.php?id=" . $student_data['password'] . "'>Update</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <button onclick="window.location.href='home.php';">Home</button>
    </body>
</html>