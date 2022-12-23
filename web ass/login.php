
<?php
   include("config.php");
   session_start();?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <Div class="full">
        <span class="titel"> Login </span>
        <div class="forms">
            <form action="login.php" method="post">
                <div class="info">
                    <i class="material-icons l">person</i>
                    <input type="text" name="username" placeholder="Enter user name"><br>
                    <i class="material-icons l">lock</i>
                    <input type="password" name="password" placeholder=" Enter Password">
                    <i class="material-icons p">visibility</i>
                </div>

                <div class="check">
                    <div class="rem">
                        <input type="checkbox" name="remember" class="text">
                        <label for="remember"> Remember me</label>
                    </div>
                   

                </div>
                
                <div class="log"><input type="submit" name="login" value="login"></div>

            </form>
            <br>
            <span style="margin:0 0 0 45px; " > Dont Have account <a href="register.php"> Create Account</a></span>
        </div>
    </Div>

    <?php
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
	  
      $sql = "SELECT * FROM user WHERE name='$myusername' AND pass='$mypassword' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_assoc($result);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        
         //$_SESSION['login_user'] = $myusername;
         
         header("location: index.php");
      }else {
        echo "Your Login Name or Password is invalid";
      }
   }
?>
    


</body>

</html>