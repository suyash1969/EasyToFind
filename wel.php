<?php
session_start();
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
    <?php 

    require 'dbcon.php';
    $name=$_SESSION['name'];
    echo $name;
    $query = " SELECT * FROM institution WHERE name='$name' ";

    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);

    $image=$row['profile'];
    $im=$row['institute'];
    ?>
    <img src="<?php echo $image; ?>">
    <?php
    echo '<div>'.$im.'</div>';

    ?>
</body>
</html>