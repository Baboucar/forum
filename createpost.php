<?php

  session_start();
   if(is_null($_SESSION["username"])){
       header("Location:login.php");
   }
    $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST"){
       $connection = mysqli_connect("localhost", "baboucarr","7235750","forum");
       $title = $_POST["title"];
       $description = $_POST["description"];
       $poster = $_SESSION["username"];
       if(empty($title) or empty($description)){
           $error = "Invalid Input";
       }
       else{
           $checktitle = "SELECT title from post WHERE title = '$title'";
           $query = mysqli_query($connection,$checktitle);

           $data = mysqli_fetch_assoc($query);
           if(! is_null($data["title"])){
               $error = "Post title already exist";
           }
           else{
           $sql = "INSERT INTO post(poster,title,description) VALUES('$poster','$title','$description') ";
           $query = mysqli_query($connection,$sql);
           }
           if($query){
               echo "Post created";
           }
           else{
               echo "Error creating post !". $connection->error;
           }
       }
   }

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
    <h1>Create a  Post</h1>
     <form action="" method="post">

       <?php   echo $error;  ?>
        <div>
        <input type="text" name="title" id="" placeholder="title">
        </div>
        <div>
        <textarea name="description" id="" cols="30" rows="10" placeholder="description">
        
        </textarea>
        </div>
        
        <input type="submit" value="Submit">
     </form>
</body>
</html>