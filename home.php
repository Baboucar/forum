<?php
session_start();

if(is_null($_SESSION["username"])){
    header("Location:login.php");
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
     <p>Welcome <?php echo $_SESSION["username"];   ?></p>
     <a href="createpost.php">Create Post</a> <br>

     <?php
    $connection = mysqli_connect("localhost", "baboucarr","7235750","forum");
    $sql = "SELECT title, poster from post";
    $query = mysqli_query($connection, $sql );
      
     ?>
     <?php  while($data = mysqli_fetch_assoc($query)):   ?>
            <a href="showcontent.php?title='<?php  echo $data["title"];  ?>'"><?php echo  $data["title"];     ?>   </a> 
            <sub> <?php echo $data["poster"];   ?> </sub>
<?php endwhile;?>
     
</body>
</html>


