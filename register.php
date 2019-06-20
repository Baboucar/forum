<?php

 if($_SERVER["REQUEST_METHOD"] == "POST"){

if($connection){
    // echo "Connection success";
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty($username) or empty($password) or !filter_var($email,FILTER_VALIDATE_EMAIL) ){
        $error = "Invalid credentials";
    }
    else{
        //$password = password_hash($password,PASSWORD_DEFAULT);
        $check = mysqli_query($connection,"SELECT username, email FROM register WHERE username = '$username");
        $data = mysqli_fetch_assoc($query);
        if(!is_null($data["username"])){
              $error = "username already exist ";
        }  
        else if(!is_null($data["email"])){
                $error = "Email already exist !";
            }
            else{
                $sql = "INSERT INTO register(username,email,password) VALUES('$username','$email','$password')";
                $query = mysqli_query($connection,$sql);
                
                if($query){
                    echo "Record Saved";
                }
                else{
                    echo $connection->error;
                }
            }
        }
       
    }

}
else{
    echo "connection failed";
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
 <h1>REGISTER</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <input type="text" name="username" id="">
        <input type="email" name="email" id="">
        <input type="password" name="password" id="">
        <input type="submit" value="Submit">
    </form>
</body>
</html>