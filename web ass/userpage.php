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
            if(isset($_POST['login'])){
                    $temp=user::getUser($_POST['username']);
                    $row=$temp->fetch();
                    if($temp->rowCount()==1){
                    if($row['pass']==$_POST['password']){
                       ?>
                        <Div class="full">
        <span class="titel"> User Information </span>
        <br>
        <div class="forms">
      
        <div class="info"> <span> User Name : </span> <span style="color :red;"> <?php echo "  " .$row['name'] ?></span></div>
       <div class="info"> <span> User Location : </span><span style="color :red;"><?php echo $row['location'] ?></span></div>
       <div class="info"><span> User Password : </span><span style="color :red;"><?php echo $row['pass'] ?></span></div>
       <div class="info"><span> User Image: </span><span style="color :red;"><?php echo $row['image'] ?></span></div>
       <div class="info"> <span> User Type: </span><span style="color :red;"><?php echo $row['type'] ?></span></div>
       <br>
     
       <a href="login.php" style="margin-left:30px;"> GO TO LOGIN  </a>   
    </div>
    </Div>





                    <?php }
                    else{
                        echo '<script>alert(" the password uncorrect.")</script>';
                        echo '<script type="text/javascript">
                        window.open("login.php");
                    </script>';
                    }
                    }
                    else{
                        echo '<script>alert(" user not exist .")</script>';
                        echo '<script type="text/javascript">
                        window.open("login.php");
                    </script>';
                    }
                }
                    ?>







   
      
      


</body>

</html>