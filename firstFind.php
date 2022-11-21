<!DOCTYPE html>
<html>
<head>
<style>
.button {
    width:500px;
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 150px 400px;
  cursor: pointer;
}
</style>
</head>
<body onload="getLocation()">

<script type="text/javascript">
    function getLocation(){
        if(navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }
    function showPosition(position)
    {
        document.getElementById("lats").value=+position.coords.latitude;
        document.getElementById("longs").value=+position.coords.longitude;

    }

</script>

<form action="firstFind.php" method="POST">
<input type="hidden" name="lats" id="lats">
<input type="hidden" name="longs" id="longs">





<button class="button" type="submit" name="subm" id="subm">Button</button>

<?php
if(isset($_POST['subm']))
{
    $l1=$_POST['lats'];
    $l2=$_POST['longs'];
    header("Location: secondFind.php?lat=$l1&long=$l2");
}
?>


</form>
</body>
</html>


