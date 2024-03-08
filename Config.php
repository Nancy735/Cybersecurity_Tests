<?php
  $dsn='mysql:host=localhost;dbname=university_system';
  $user="root";
  $password="";
  $options=array
  (
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    pdo::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  );
  try{
    $db=new PDO($dsn,$user,$password,$options);
    $sql="INSERT INTO student_data ( username , email, password , role , user_id ) 
    VALUES (:usrname , :mail , :pass , :rol , :usr_id)";
    echo "You Are Connection ";
  }
  catch(PDOException $e){
    echo "Connection Error: " . $e->getMessage();
  }
?>