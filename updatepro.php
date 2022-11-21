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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" >
    <style type="text/css">
        body{
            margin: 0;
            padding:0 ;
            
        }
        .wrapper{
            height: 100px;
            width: 100vh;
           
            display: flex;
            justify-content: center;
            align-items: center;

            
            
        }
        .wrapper img
        {
            height:150px;
            width: 150px;
            border-radius: 50%;
            position: absolute;
            top: 1%;
            right: 65%;

        }
        .my_file{
            position:absolute;
            bottom: 0;
            outline: none;
            color: transparent;
            width: 100%;
            box-sizing: border-box;
            padding: 1px 1px;
            cursor:pointer;
            transition: 0.5s;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
        }
        .my_file::-webkit-file-upload-button{
            visibility: hidden;
        }
        .my_file::before{
            content: '\f030';
            font-family: fontAwesome;
            font-size: 0.5px;
            color: #fff;
            display: inline-block;
            -webkit-user-select: none;

        }
        .my_file::after
        {
            content: 'update';
            font-family: 'arial';
            font-weight: bold;
            color: #fff;
            display: block;
            top:70px;
            font-size: 1px;
            position: absolute;
        }
        .my_file:hover{
            opacity: 1;
        }
       #b1{
            width: 20%;
            margin: 10px auto;
            display: flex;
            margin-top: 80px;
         justify-content: center;
        border-radius: 8px; 
        
        }
        .button{
            display: flex;
  justify-content: center;
        }
       
        #b2{
            width: 20%;
            margin: 10px auto;
            display: flex;
  justify-content: center;
     border-radius: 8px;
            
    
            
        }
        #b2 a
        {
            text-decoration: none;
            color: black;
        }
        #b1 a
        {
            text-decoration: none;
            color: black;
        }
        #b2:hover
        {
            color: red;
            background: rgb(233, 120, 120);
            
        }
        #b1:hover
        {
            color: red;
            background: rgb(233, 120, 120);
            
        }
        .text1{
            /* border: 2px solid black; */
            width: 400px;
            height: 50px;
            position: absolute;
            top: 6%;
            margin-left: 600px;
            color: black;
            font-size: 30px;
    
        }
        .text2{
            /* border: 2px solid black; */
            width: 350px;
            height: 50px;
            position: absolute;
            top: 12%;
            margin-left: 600px;
            color: black;
            font-size: 15px;
    
        }
        
        .containerbb
        {
         
           margin-right:150px
        }
        
        .connn{
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
        }

        .main_caontainer
        {
            
            margin: 0% 0% 1% 1%;
            border: none;
            position: relative;
            width: 24%;
     
           
        }
        .image
        {
                display: block;
                width: 95%;
            height: 380px;
            /* margin-bottom: 30px; */
            


        }
        .overlay
        {
            
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.75);
            overflow: hidden;
            width: 95%;
            height: 0;
            transform: .5s ease;
        }
        .main_caontainer:hover .overlay
        {
            height: 380px;
        }
        .main_caontainer
        h1{
            width: 100%;
            margin-top: 30%;
            color: white;
            font-size: 20px;
            position: absolute;
            text-align: center;
            font-family: 'Damion',cursive;
            transform: rotate(-5deg)skewX(-5deg);

        }
        .main_caontainer
        h2
        {
            text-align: center;
            font-family: 'Roboto', sans-serif;
            color: white;
            font-size: 20px;
            margin: 60% 0 0 18%;
            width: 70%;
            letter-spacing: 5px;
            line-height: 1.5em;
        }

        
     
    </style>
</head>
<body>
        


<?php
    require 'dbcon.php';
    
    $name = $_SESSION['name'];
    $query=" SELECT * FROM institution WHERE name='$name' ";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
    $image=$row['profile'];
    $Bio=$row['Bio'];
    if($image==null)
    {
      $image="file\default.jpg";
    }
    else
    {
      $image=$image;
    }

?>








    <div class="wrapper">
        <img src="<?php echo $image; ?>" class="nav-profile-img">
    </div>
    
    <div class="text1">
    <?php echo $_SESSION['name'];?>
    </div>
    <div class="text2">
    <?php echo $Bio; ?>
    </div>
    
    <div class="containerbb">
    <div class="button">
    <button id="b1"><a href="logout.php">LOgout</a></button></div>
 
    <div class="button"> <button id="b2"><a href="btnupdate.php">Edit Profile</a></button></div>
</div>

<hr>
<div class="connn">
    <?php
        require 'dbcon.php';
        // $queryh = "SELECT * FROM post ORDER BY id DESC";
        $queryh=" SELECT * FROM post WHERE name='$name' ";
        $resultt = mysqli_query($con,$queryh);
        if($con === false)
        {
            die("ERROR: Could not connect. ".mysqli_connect_error());
        }
        
        if(mysqli_query($con,$queryh))
        {

            while($row=mysqli_fetch_array($resultt))
            {
                
                $post=htmlspecialchars($row['PostW'],ENT_QUOTES,'UTF-8');
                $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                $img=htmlspecialchars($row['ImageP'], ENT_QUOTES, 'UTF-8');
               



                    echo' 
                    <div class="main_caontainer">
                        <img src=" '.$img.'" alt="" class="image">
                        <div class="overlay">
                            <h1>'.$name.'</h1>
                            <h2>'.$post.'</h2>
            
                        </div>
                    </div>
                 ';







            }
        }
            
    


    ?>
    </div>
    <!-- <div class="caon">
        <div class="main_caontainer">
            <img src=" '.$img.'" alt="" class="image">
            <div class="overlay">
                <h1>'.$name.'</h1>
                <h2>'.$post.'</h2>

            </div>
        </div>
    </div> -->
   

</body>
</html>