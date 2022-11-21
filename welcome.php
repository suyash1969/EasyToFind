<?php
session_start();
if(!isset ($_SESSION['name']))
{
    echo "your are logged out";
    header('location:loginpage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> this is you website bhaiii marchode     <?php echo $_SESSION['name'];?><h1>
        <button><a href="wel.php"> Go to step</a></button>
        <button><a href="logout.php">LOgout</a></button>
</html>