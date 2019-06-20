<?php
    session_start();
   if(is_null($_SESSION["username"])){
       header("Location:login.php");
   }
       $title = $_GET["title"];
        //  echo $title;

         $connection = mysqli_connect("localhost","baboucarr","7235750","forum");

         $sql  = "SELECT poster,title, description FROM post WHERE title = $title ";
         $query = mysqli_query($connection, $sql);

         $data = mysqli_fetch_assoc($query);
            echo $data["poster"];  
         echo $data["title"]; 
           echo $data["description"]; 

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   
</body>
</html>