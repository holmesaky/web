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


<?php

	require_once('Class.user.php');

    $val=false;
    $val2=false;
   
	if(isset($_POST['signin']))
	{
        
        $stuInfo=user::getUser($_POST['username']);
        $res=$stuInfo->fetch();
        $row1=$stuInfo->rowCount();
        if($row1 == 1){
            echo '<script>alert(" The name alrady exist ")</script>';
        }

        else{

		$test =user::adduser($_POST['username'],$_POST['loc'], $_POST['password'],$_FILES["image"]);
        $user=user::getUser($_POST['username']);
        $res=$user->fetch();
        if($test)
		{	
            echo '<script>alert(" Records inserted successfully.")</script>';
            $val=true;
          
		}
		else
		{
            echo '<script>alert(" Records Canit insert.")</script>';
		}         
    
    }
        
	}
    if(isset($_POST['login'])){
       
        $temp=user::getUser($_POST['username']);
        $res=$temp->fetch();
        $row=$res;
        if($temp->rowCount()==1){
           
            if($row['pass']==$_POST['password']){
   
    $val2=true;
    
            }
            else{
                echo '<script>alert(" the password uncorrect.")</script>';
    
            }
    
    
        }
        else{
            echo '<script>alert(" the user not exist.")</script>';
        }
    
    }
    if($val||$val2){
if($res['type']==1){
    echo'<script type="text/javascript">
    window.open("index.php");
    window.close("login.php");
    window.close("register.php");
  </script>';
}else{
    ?>
 <Div class="full">
        <span class="titel"> User Information </span>
        <br>
        <div class="forms">
      
        <div class="info" style="margin-top:45px"> <span> User Name : </span> <span style="color :red;"> <?php echo "  " .$res['name'] ?></span></div>
       <div class="info"> <span> User Location : </span><span style="color :red;"><?php echo $res['location'] ?></span></div>
       <div class="info"><span> User Password : </span><span style="color :red;"><?php echo $res['pass'] ?></span></div>
       <div class="info"><span> User Image: </span><span style="color :red;"><?php echo $res['image'] ?></span></div>
       <div class="info"> <span> User Type: </span><span style="color :red;"><?php echo $res['type'] ?></span></div>
       <br>
     
       <a href="login.php" style="margin-left:30px;"> GO TO LOGIN  </a>   
    </div>
    </Div>
   


<?php 

}
    }

	?>
                       
       
       </body>

</html>