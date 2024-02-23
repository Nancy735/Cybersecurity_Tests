
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<?php 
     
    if( isset($_GET['fName']) ) {
        function cleanData($data){ 
            $data=htmlspecialchars($data);
            $data=htmlentities($data);
            $data=trim($data); 
            $data=strip_tags($data); 
            $data=stripcslashes($data); 
            return $data;
        }
        echo "<img src='".cleanData($_GET['fName']).">";
    }
?>
</body>
</html>
