<?php

session_start(); //to carry data and vars among pages initialized in a page and used in another
$update=false; //UPDATE BUTTON
$name=$location=""; //UPPDATE FN 
$id=0;//update fn to get id of selected values to br updated from the form

$mysqli= new mysqli('localhost','admin','12345678','crud') or die(mysqli_error($mysqli)); //connect too database 

if(isset($_POST['submit'])){ //check if submit is clicked to get data
    $name=$_POST['name']; //getting data from from 
    $location=$_POST['loc'];
    $mysqli->query("INSERT INTO data (name,location) VALUES('$name','$location')") or die($mysqli->error); 
    //insert or error  if no error check in your browser if the con.page is loaded with no errors then the data is insert in your database go check ur phpmyadmin


    $_SESSION['message']="Record has been saved";
   

  //to direct the user back to trialpage we use header with every crud function 
  header("location:trial1.php");


}

if(isset($_GET['delete'])){ //we are using get couse we accessed it throught the url in trial1 hrefs 
   $id=$_GET['delete'];
   $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error); 
   
   $_SESSION['message']="Record has been deleted";
   

   header("location:trial1.php"); //redirect to home page instently

}

// //edit function
if(isset($_GET['edit'])){     //check if edit is pressed the id value of selected item is sent in url 
$id=$_GET['edit'];    //getting the id sent in url 
$update=true;//to change button on click
$res=$mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysql->error()); //geting data from database for this selected id 
if(count($res)==1){//check if record is found in database
    $row=$res->fetch_array();//geting data as array 
    $name=$row['name'];
    $location=$row['location'];
    //these 2 values name and loc will be displayed in our input   
}
}
//update button
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $location=$_POST['loc'];

    $mysqli->query("UPDATE data SET name='$name',location='$location' WHERE id=$id") or die($mysqli->error());

   $_SESSION['message']="Record has been updated";
   

   header("location:trial1.php");
}






?>