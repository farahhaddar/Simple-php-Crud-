<?php require_once 'con.php'; ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>

 <?php

 if(isset($_SESSION['message']))
 {
 echo $_SESSION['message'];
 unset($_SESSION['message']);
 }
?>
<br>

<?php
$mysqli = new mysqli('localhost','admin','12345678','crud') or die(mysqli_error($mysqli)); //conect too data base 

$res = $mysqli->query("SELECT * FROM data") or die($mysql->error());

while($row=$res->fetch_assoc())
{
   echo $row['name']." ";
   echo $row['location']." ";?>    

   <a href="trial1.php?edit=<?php echo $row['id'];?>"> edit</a>
   <a href="con.php?delete=<?php echo $row['id'];?>">delete </a>
   <br>

<?php 
}

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo'</pre>';
}

?>








<form  method="post"  action="con.php">
<!--  hidden to allow us get the id from  -->
<input type="hidden" name="id" value="<?php echo $id   ?>"> 
<labl>name</labl> <br>
<input type="text" name="name"  value="<?php echo $name?>" placeholder="name">
<br>

<labl>location</labl><br>
<input type="text" name="loc" value="<?php echo $location?>"  placeholder="location"><br>


<?php
if($update==true): ?>
    <button type="submit" name="update">update</button>
<?php else: ?>
 <button type="submit" name="submit">save</button>
<?php endif;?>

</form>
   
</body>
</html>
