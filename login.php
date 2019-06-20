<?php
  $error = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $connection = mysqli_connect("localhost","baboucarr","7235750","forum");

    $username = $_POST["username"];
    $password = $_POST["password"];
  

    if(empty($username) or empty($password)){
        $error = "invalid credentals";
    }

    else{
           $sql = "SELECT username,password FROM register  WHERE  username ='$username'; ";
            $query = mysqli_query($connection,$sql);

            if(!$query){
                echo $query->error;
            }
            $data  = mysqli_fetch_assoc($query);

           

            if(is_null($data["username"])){
              
                $error = "username does not exist";
            }
            else {
                if($password == $data["password"]){
                    session_start();
                    $_SESSION["username"] = $username;
                     header("Location:home.php");
                }
                else{
                    $error = "Password is incorrect";
                }
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
   <?php  echo $error; ?>
     <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
     <input type="text" name="username" id="">
     <input type="password" name="password" id="">
     <input type="submit" value="submit">
     </form>
 </body>
 </html>