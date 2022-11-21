<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        *{
            margin: 0;
            padding:0;
            box-sizing: border-box;
        }
        .edit-menu-container{
            display: flex;
  justify-content: center;
  padding-top: 10px;
        }
       
        .edit-main-con{
            width: 100%;
            max-width:768px;
            margin: auto;

             
        }
        .edit-image-con {
            width: 100%;
            max-width:100px;
            margin: auto;
            padding-top: 20px;
            padding-bottom:20px ;

            
             
        }
        .edit-image-con img {
            width: 100px;
            height: 100px;  
            border-radius: 50%;

        }
        .edit-image-con button {
            width: 130px;
            border: none;
            margin-top: 10px;
            color: black;
            font-size: 16px;
            margin-left: -12px;
             
            
        }
        span input[type=file]
        {
            width: 90px;
    
            
        }
        .edit-profile-con{
            width: 100%;
            padding: 10px;

        }
        .edit-profile-con input[type=text]
        {
            width: 100%;
            padding: 5px;
            margin-top: 8px;
            margin-bottom: 8px;
            border: none;
            border-bottom: 1px solid black;
             
        }
        .edit-profile-con  label{
            padding: 5px;
            margin-top: 5px;
        }
        .button{
  margin: 10px 0;
  width: 300px;
  height: 50px;
  font-size: 18px;
  line-height: 50px;
  font-weight: 600;
  background: #dde1e7;
  border-radius: 25px;
  border: none;
  outline: none;
  cursor: pointer;
  color: #595959;
  box-shadow: 2px 2px 5px #BABECC,
             -5px -5px 10px #ffffff73;
}
.button:focus{
  color: black;
  box-shadow: inset 2px 2px 5px #BABECC,
             inset -5px -5px 10px #ffffff73;
}    
.edit-profile-con input[type=email]
        {
            width: 100%;
            padding: 5px;
            margin-top: 8px;
            margin-bottom: 8px;
            border: none;
            border-bottom: 1px solid black;
             
        }  
    </style>
</head>
<body>
        <?php
            require 'dbcon.php';
            $name=$_SESSION['name'];
            $query=" SELECT * FROM institution Where name='$name' ";
            $result=mysqli_query($con,$query);
            $row=mysqli_fetch_array($result);
            $image=$row['profile'];
            $Bio=$row['Bio'];
            $phone=$row['phone'];  

            $query2=" SELECT * FROM registration WHERE name='$name'";
            $result2=mysqli_query($con,$query2);
            $row2=mysqli_fetch_array($result2);
            $email=$row2['email'];
            // if(!isset($_POST['submit']))
            // {
            //     $name1=mysqli_real_escape_string($con, $_POST['name']);
            //       $profile=mysqli_real_escape_string($con, $_POST['profile']);
            //       $phone=mysqli_real_escape_string($con, $_POST['phone']);
            //       $email=mysqli_real_escape_string($con, $_POST['email']);
            //       $Bio=mysqli_real_escape_string($con, $_POST['Bio']);
            //      $query1= "UPDATE institution SET name='$name',profile='$profile',Bio='$Bio',phone='$phone' WHERE name='$name' ";
            //      $query3= "UPDATE registration SET email='$email' WHERE name='$name' ";
            //      $res2=mysqli_query($con,$query1);
                 
            //      $res3=mysqli_query($con,$query3);

            // }
            if($image==null)
    {
      $image="file\default.jpg";
    }
    else
    {
      $image=$image;
    }

        ?>
        















    <div class="edit-menu-container" >
       
           <h4>Edit Profile</h4>  
    </div>
    <div class="edit-main-con">
        <form action="" method="POST">
        <div class="edit-image-con">

            <img src="<?php echo $image ?>" alt="">
            <button>Change Profile 
                <span>
                    <input type="file" name="profile">
                </span>
            </button>
        
        </div>
        <div class="edit-profile-con">
        <label >name</label>
        <input type="text" value="<?php echo $_SESSION['name'];?>" name="name">
        <br><br><br>
        <label >email</label>
        <input type="email" value="<?php echo $email ?>" name="email">
        <br><br><br>
        <label >phone</label>
        <input type="text" value="<?php echo $phone ?>" name="phone">
        <br><br><br>
        
        <label >Bio</label>
        <input type="text" name="Bio" value="<?php echo $Bio ?>" name="Bio">
      <button class="button" type="submit" name="submit">update Profile</button>
        </div>
    </form>
    </div>
</body>
</html>