<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>

<body>


<?php

	require_once('Class.user.php');


	if($_SERVER['REQUEST_METHOD']=='POST')
	{
        $stuInfo=user::getUser($_POST['username']);
        $row=$stuInfo->rowCount();
        if($row == 1){
            echo '<script>alert(" The name alrady exist ")</script>';
        }

        else{
		$test =user::adduser($_POST['username'],$_POST['email'], $_POST['pass'],"imag");

     


        if($test)
		{	
            echo '<script>alert(" Records inserted successfully.")</script>';
		}
		else
		{
            echo '<script>alert(" Records Canit insert.")</script>';
		}  
	}}
	
	?>




    <div class="full" id="sign">
        <span class="titel"> Sign Up </span>
        <div class="forms">
            <form action="register.php" method="post">
                <div class="info">
                    <i class="material-icons s">person</i>
                    <input type="text" name="username" placeholder="Enter your  Name" required> <br>
                   
                    <i class="material-icons s">email</i>

                    <input type="text" name="email" placeholder="Enter your  Email" required>
                    <br>
                    <i class="material-icons s">lock</i>
                    <input type="password" name="pass" placeholder=" Enter Password">
                    <i class="material-icons pas"> visibility </i>
                    <br>
                    <i class="material-icons s">lock</i>
                    <input type="password" name="Cpass" placeholder=" conform password"><br>
                   <div id="choos"> 
                    
                    <label for="input" style="cursor: pointer; position: absolute; top:20px ;" >
                        Select Image
                        <input type="file" id="input" name="imag"   accept="image/jpeg, image/png, image/jpg">
                        
                    </label>
                    <div id="image"> <i class="material-icons photo">person</i> </div>
                </div>
                   
                   
                 
                    <script> const image_input = document.querySelector("#input");
                        image_input.addEventListener("change", function () {
                            const reader = new FileReader();
                            reader.addEventListener("load", () => {
                                const uploaded_image = reader.result;
                                document.querySelector("#image").style.backgroundImage = `url(${uploaded_image})`;
                         
                        
                        });
                            reader.readAsDataURL(this.files[0]);
                        });</script>


                </div>



                <div class="check">
                    <div class="agree">
                        <input type="checkbox" name="remember" class="text">
                        <label for="remember"> agree the contact </label>
                    </div>

                </div>
                <div class="log"><input type="submit" name="signin" value="sign in"></div>
            </form>
        </div>
    </div>


</body>

</html>