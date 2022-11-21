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

function timeSince($times) {
    date_default_timezone_set('Asia/Kolkata');
    $time = time() - $times; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    // echo '<h1> '.time()." - ".$times." - ".$time. '</h1>';
    $tokens = array (31536000 => 'year', 2592000 => 'month', 604800 => 'week', 86400 => 'day', 3600 => 'hour', 60 => 'minute', 1 => 'second');//73446
    foreach ($tokens as $unit => $text) {
      if ($time < $unit) continue;
      $numberOfUnits = floor($time / $unit);
      return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }
  }
    require 'dbcon.php';
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
    {
        $name=$_SESSION['name'];

        $cquery=" SELECT * FROM post WHERE name='$name' ";
     $cresutl=mysqli_query($con,$cquery);
     $row=mysqli_fetch_array($cresutl);
     $id=$row['id'];
        date_default_timezone_set('Asia/Kolkata');
        $Comment_t=time();
        $commentw = mysqli_real_escape_string($con,$_REQUEST['commentw']);
        if($commentw==='')
        {
            echo "<script>document.getElementById('failure').innerHTML = '<p>Write Comment.</p>';</script>";
        
        }else{
            
            $query="INSERT INTO comment (name,id,commentw,Comment_t) VALUE ('$name','$id','$commentw','$Comment_t')";
            if(mysqli_query($con,$query))
            {
                $msg='Comment submitted without any problem';
                header('Refresh:0');
                alert("$msg");
            }else{
                echo"ERROR: Could not able to execute $query. ".mysqli_error($con);
            }
        }
    }
?>

<h1>Discustion here</h1>
<?php
    include 'dbcon.php';
    $name=$_SESSION['name'];
    $cquery=" SELECT * FROM post WHERE name='$name' ";
    $cresutl=mysqli_query($con,$cquery);
    $row=mysqli_fetch_array($cresutl);
    $id=$row['id'];
    // $id = mysqli_real_escape_string($con, $_REQUEST['id']);
    $query = "SELECT * FROM comment WHERE id=$id ORDER BY comment_id DESC";
    $result = mysqli_query($con, $query);
    if ($con === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if(mysqli_query($con, $query)) {

        if ($result->num_rows == 0) {
            echo "<div class='empty-comments'><p>There doesn't seem to be anything here yet</p></div>";
        }
        else {
            echo '<div class="home2">';
            while($row = mysqli_fetch_array($result))
            {
                $id = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
                $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                $commentw = htmlspecialchars($row['commentw'], ENT_QUOTES, 'UTF-8');
                $Comment_t = htmlspecialchars($row['Comment_t'], ENT_QUOTES, 'UTF-8');

                echo '<div class="comment-container">';
                    
                    echo '<p id="submission-info">
                    
                    <i class="fa fa-user"></i><a href="?profile= '. $name . '">' .' '. $name . '</a> ';
                    echo '<br>';
                    
                    echo timeSince($Comment_t). ' ago, ';
                    echo '<br>';
                        echo '<p>'. $commentw .'</p>';
                        echo '<br>';
            }
        }
    } else {
        echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
    }

?>










<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <div class="form-group">
        <label for="">Ellaborate your comment here</label>
        <textarea class="form-control" id="commentw" name="commentw" row3="3" placeholder="write comment here"></textarea>

</div>
<button type="submit" class="btn btn-success" name="submit">Post Comment</button>
</form>
</body>
</html>