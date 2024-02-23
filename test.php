<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP FORM</title>
    </head>
    <body>
        <h1>PHP Form Vaildation Example</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required value="<?php// echo $name;?>">
            <span class="error">*</span><br>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required value="<?php //echo $email;?>">
            <span class="error">*</span><br>

            <label for="wbesite">Website</label>
            <input type="text" name="website" id="website" value="<?php// echo $website;?>">
            <span class="error">*</span><br>

            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea><br>
            
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" id="female" required ><?php //if (isset($gender) && $gender=="female") echo "checked";?>Female
            <input type="radio" name="gender" id="male" required <?php// if (isset($gender) && $gender=="male") echo "checked";?>>Male
            <input type="radio" name="gender" value="other" required <?php  //if (isset($gender) && $gender=="other") echo "checked";?>>Other 
            <span class="error">*</span><br>
            
            <input type="submit" value="Submit">

            <h2>Your Input:</h2>
        </form>
    </body>
</html>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$comment = $_POST['comment'];
$website = $_POST['website'];

/*function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    echo $nameErr;
  } else {
    $name = test_input($_POST["name"]);

  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    echo $emailErr;
  } else {
    $email = test_input($_POST["email"]);
    echo $email;
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
/*$name = test_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed";
}
he preg_match() function searches a string for pattern, returning true if the pattern exists, and false otherwise.
*/
/*
$website = test_input($_POST["website"]);
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
  $websiteErr = "Invalid URL";
}
*/
/*<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
?>
*/
?>

