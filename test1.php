<?php 
  /*
  PDO => The way to connection to db;
  Mysql => Used in db management;
  */
  $dsn = 'mysql:host=localhost;dbname=products'; //Data Source Name;
  $user = 'root'; 
  $password = '';
  $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
  );
  try{
    $pdo = new PDO( $dsn , $user , $password , $options); //Start New Connection With PDO;
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //Set An Attribute;
    $q = "INSERT INTO items (name) VALUES ('Product1')"; //Insert Values , we do not need to use db_name => we are already in it,and id => Completed sequentially;
    $pdo -> exec($q); 
    echo "You Are Connected";
  }
  catch(PDOException $e){
    echo "Faild" . $e->getMessage() ;
  }
?>