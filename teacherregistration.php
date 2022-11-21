<?php
    session_start();
    if(!isset($_SESSION['name']))
    {
        header('Location:loginpage.php');
        exit;
    }
    ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  height: 100%;
}
body{
  display: grid;
  place-items: center;
  background: #dde1e7;
  text-align: center;
}
.content{
  width: 800px;
  padding: 40px 30px;
  background: #dde1e7;
  border-radius: 10px;
  box-shadow: -3px -3px 7px #ffffff73,
               2px 2px 5px rgba(94,104,121,0.288);
               
}
.content .text{
  font-size: 33px;
  font-weight: 600;
  margin-bottom: 35px;
  color: #595959;
}
.field{
  height: 70px;
  width: 100%;
  display: flex;
  position: relative;
}
.field:nth-child(2){
  margin-top: 20px;
}
.field input{
  height: 100%;
  width: 100%;
  padding-left: 45px;
  outline: none;
  border: none;
  font-size: 18px;
  background: #dde1e7;
  color: #595959;
  border-radius: 25px;
  box-shadow: inset 2px 2px 5px #BABECC,
              inset -5px -5px 10px #ffffff73;
}
.field input:focus{
  box-shadow: inset 1px 1px 2px #BABECC,
              inset -1px -1px 2px #ffffff73;
}
.field span{
  position: absolute;
  color: #595959;
  width: 50px;
  line-height: 50px;
}
.field label{
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 45px;
  pointer-events: none;
  color: #666666;
}
.field input:valid ~ label{
  opacity: 0;
}

button{
  margin: 15px 0;
  width: 100%;
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
button:focus{
  color: #3498db;
  box-shadow: inset 2px 2px 5px #BABECC,
             inset -5px -5px 10px #ffffff73;
}
.sign-up{
  margin: 10px 0;
  color: #595959;
  font-size: 16px;
}
.sign-up a{
  color: #3498db;
  text-decoration: none;
}
.sign-up a:hover{
  text-decoration: underline;
}



      </style>
   </head>
   <body>
      <div class="content">
         <div class="text">
            Registration For Institution
         </div>
         <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="field">
               <input type="text" required name="institute">
               <span class="fas fa-user"></span>
               <label>Enter Name of Institution</label>
            </div>
            <br>
            <div class="field">
               <input type="text" required name="location">
               <span class="fas fa-lock"></span>
               <label>Enter your current location</label>
            </div>
            <br>
            <div class="field">
                <input type="text" required name="phone">
                <span class="fas fa-lock"></span>
                <label>Enter your phone number</label>
             </div>
             <br>
             <div class="field">
                <input type="file" required name="profile">
                <span class="fas fa-lock"></span>
                <label>Enter your photograph</label>
             </div>
             <br>
             <div class="field">
                <input type="text" required name="qualification">
                <span class="fas fa-lock"></span>
                <label>Enter your qualification</label>
             </div>
             <div class="field">
                <input type="text" required name="Bio">
                <span class="fas fa-lock"></span>
                <label>Bio </label>
             </div>
             <br>
             <div class="field">
                <input type="file" required name="lastdegree">
                <span class="fas fa-lock"></span>
                <label>Enter your most advance Degree earned</label>
             </div>
           
           
           <br>
            
           
            <button type="submit" name="submit">Summit For Verification</button>

            <?php
                include 'dbcon.php';
                $profile="file\default.jpg";
                if(isset($_POST['submit']))
                {
                  $name=$_SESSION['name'];
                  $institute= mysqli_real_escape_string($con, $_POST['institute']);
                  $location=mysqli_real_escape_string($con, $_POST['location']);
                  $phone=mysqli_real_escape_string($con, $_POST['phone']);
                  $profile=mysqli_real_escape_string($con, $_POST['profile']);
                  $qualification=mysqli_real_escape_string($con, $_POST['qualification']);
                  $lastdegree=mysqli_real_escape_string($con, $_POST['lastdegree']);
                  $Bio=mysqli_real_escape_string($con, $_POST['Bio']);

                  //file work automatically to the user file work
                  
                  $phonequery=" SELECT * FROM  institution where phone='$phone' ";
                  $pquery=mysqli_query($con,$phonequery);
                  $phonecount=mysqli_num_rows($pquery);
                  if($phonecount>0)
                  {
                    ?>
                    <script>
                      alert("sir you have already register with this phone number");
                    </script>
                    <?php
                  }
                  else
                  {
                  

                  $query=" INSERT INTO institution(institute, location, phone, profile, qualification, lastdegree ,Bio , name) VALUES (' $institute','$location','$phone','$profile','$qualification','$lastdegree','$Bio','$name')";  
                  if(mysqli_query($con,$query))
                  {
                    echo "<script> alert('Post Submitted Succesfully');window.location.assign('homepp.php'); </script>";
                  }
                  else
                  {
                    echo "not working $query. ". mysqli_error($link);
                  }
                  if($profile===null)
                  {
                    
                  }
                }
                }
            ?>
           
         </form>
      </div>
   </body>
</html>