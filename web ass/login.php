
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
<script>
function showpass() {
  
  var x = document.getElementById("show");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}



</script>


</head>

<body>



    <Div class="full">
        <span class="titel"> Login </span>
        <div class="forms">
            <form action="userpage.php" method="post">
                <div class="info">
                    <i class="material-icons l">person</i>
                    <input type="text" name="username" placeholder="Enter user name" required><br>
                    <i class="material-icons l">lock</i>
                  
                    <input id="show" type="password" name="password" placeholder=" Enter Password" required>
                    <i  class="material-icons p" onclick="showpass()">visibility</i>

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


      
      


</body>

</html>