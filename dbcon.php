<?php



$server = "localhost";
$user = "root";
$password = "";
$db = "singuppp";




try{
   $dbh=new PDO("mysql:host=".$server.";dbname=".$db,$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES 'utf8'"));
}
catch(PDOException $e)
{
   exit("Error:".$e ->getMessage());
}

$con = mysqli_connect($server,$user,$password,$db);



//  if($con)
//   {
//      ?>
  <script>
//          alert("Connection Susfullyy done");
//      </script>
   <?php
//  }
//      else
//      {
//          ?>   <script>
//          alert("Connection not done");
//      </script>
   <?php
//      }
?>