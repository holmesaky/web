<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style4.css">

    <script>
       


        function hide(x) {

            var y = document.getElementById(x);
            y.style.display = "none";
        }
        function show(x) {
            var y = document.getElementById(x);
            y.style.display = "block";

        }

    </script>

</head>

<body style="background-color: white; align-items: unset;">


<?php 
require_once('Class.user.php');
//require_once('Class.Tools.php');


if(isset($_POST['remove'])){
    $temp=$_POST['username'];
    
    $row1=user::getUser($temp);
    
        if($row1->fetch()){
            $deluser=user::deleteUser($temp);
            
            if($deluser->rowCount()> 0){
                echo "<script>
                window.onload = function show() {
                    var y = document.getElementById('V_users');
                    y.style.display = 'block';
                }</script>";


            }}
}



if (isset($_POST['delete'])) {
  
    $temp=$_POST['userdelt'];
    
    $row1=user::getUser($temp);
    
        if($row1->fetch()){
            $deluser=user::deleteUser($temp);
            
            if($deluser->rowCount()> 0){
            
                echo "<script>
                window.onload = function show() {
                    var y = document.getElementById('D_users');
                    var m=document.getElementById('error2');
                    var x=document.getElementById('id1');
                    x.style.display = 'block';
                    m.innerHTML='Aww yeah, The user deleted succcssfuly';
                    y.style.display = 'block';
                }</script>";
            
            }
            else{
                //echo '<script>alert("Cant delete Admin")</script>';

                echo "<script>
            window.onload = function show() {
                var y = document.getElementById('D_users');
                var m=document.getElementById('error2');
                var x=document.getElementById('id1');
                    x.style.display = 'block';
                m.innerHTML='Aww yeah, Cant delete Admin';
                m.style.color='red';
                y.style.display = 'block';
            }</script>";} 
            }
        
        else{
            //echo '<script>alert("Cant delete")</script>';
            echo "<script>
            window.onload = function show() {
                var y = document.getElementById('D_users');
                y.style.display = 'block';
                var m=document.getElementById('error2');
                var x=document.getElementById('id1');
                    x.style.display = 'block';
                m.innerHTML='Aww yeah, user not exist !!  ';
                m.style.color='red';
    
            }</script>";
        }}


        if(isset($_POST['add']))
	{
        $stuInfo=user::getUser($_POST['username']);
        $row=$stuInfo->rowCount();
        if($row == 1){
            echo "<script>
            window.onload = function show() {
                var y = document.getElementById('A_users');
                y.style.display = 'block';
                var m=document.getElementById('add');
                var x=document.getElementById('id2');
                    x.style.display = 'block';
                m.innerHTML='Aww yeah, user Alredy exist !!  ';
                m.style.color='red';
    
            }</script>";
        }

        else{
		$test =user::adduser($_POST['username'],$_POST['userloc'], $_POST['userpass'],$_FILES['imag']);
        if($test)
		{	
            echo "<script>
            window.onload = function show() {
                var y = document.getElementById('A_users');
                var m=document.getElementById('add');
                var x=document.getElementById('id2');
                    x.style.display = 'block';
                m.innerHTML='Aww yeah, The user inserted  succcssfuly';
                y.style.display = 'block';
            }</script>";
		}
		else
		{
            echo "<script>
            window.onload = function show() {
                var y = document.getElementById('A_users');
                y.style.display = 'block';
                var m=document.getElementById('add');
                var x=document.getElementById('id2');
                    x.style.display = 'block';
                m.innerHTML='Aww yeah, user Cant inserted  !!  ';
                m.style.color='red';
    
            }</script>";
		}  
	}}

    if(isset($_POST['edit']))
	{
        $stuInfo=user::getUser($_POST['username']);
        $res=$stuInfo->fetch();
		echo"<script>
        window.onload = function show() {
        var y = document.getElementById('U_users');
                y.style.display = 'block';
                var x = document.getElementById('V_users');
                x.style.display = 'block';
            }
      </script>";
		
	}
 
    if(isset($_POST['upd'])){

        $test=user::updateStudent($_POST['username'],$_POST['userloc'],$_POST['userpass'],$_FILES['imag']);
  if($test){
    echo "<script>
    alert(' The User Updated.');
    </script>";
    echo "<script>
    window.onload = function show() {
        var y = document.getElementById('V_users');
        y.style.display = 'block';
    }</script>";

}
else{
    echo "<script>
    window.onload = function show() {
        var y = document.getElementById('U_users');
        var m=document.getElementById('up');
        var x=document.getElementById('id3');
                    x.style.display = 'block';
                    document.getElementById('username').value = '';
                    document.getElementById('userloc').value = '';
                    document.getElementById('userpass').value = '';
        m.innerHTML='Aww yeah, The user Cant updated ';
        y.style.display = 'block';
    }</script>";
}

    }

 if(isset($_POST['set'])){

     $userInfo=user::getUser($_POST['userset']);
     $row=$userInfo->fetch();
     $count=$userInfo->rowCount();
     if($count==1){
       if($row['pass']==$_POST['useropass']){
        $res=$_POST['usernpass'];
        $test=user::setpass($_POST['userset'],$res);

        echo "<script>
        window.onload = function show() {
            var y = document.getElementById('S_users');
            var m=document.getElementById('errorset');
            var x=document.getElementById('id4');
                    x.style.display = 'block';
            m.innerHTML='Aww yeah, The Password Set  ';
            y.style.display = 'block';
            document.getElementById('my_form').onsubmit = function() {
                return false;
            }
        }</script>";


       }
       else{

        echo "<script>
        window.onload = function show() {
            var y = document.getElementById('S_users');
            var m=document.getElementById('errorset');
            var x=document.getElementById('id4');
            x.style.display = 'block';
            m.innerHTML='Aww yeah, The Password uncorrect ';
            m.style.color='red';
            y.style.display = 'block';
        

        }</script>";
      }
       }
     else{
        echo "<script>
        window.onload = function show() {
            var y = document.getElementById('S_users');
            var m=document.getElementById('errorset');
            var x=document.getElementById('id4');
            x.style.display = 'block';
            m.innerHTML='Aww yeah, The user not exist ';
            m.style.color='red';
            y.style.display = 'block';
        }</script>";

     }



}

  





?>



    <header>
        <nav>
            <ul>
                <li class="about"> Home Page</li>
                <li class="about"> About Us</li>
                <li class="about"> Contact Us</li>
                <li class="about"> <a href="login.php" class="lin" >Login</a></li>
                <li class="about"> <a href="register.php" class="lin" >sign up</a> </li>

            </ul>
        </nav>
    </header>

    <div class="test">


        <div class="left">
            <div class="button" onclick="show('V_users')"> <i class="material-icons g">group</i> <span>View User</span> </div>
            <div class="button " onclick="show('D_users')"> <i class="material-icons g">remove</i> <span>Delete user</span> </div>
            <div class="button" onclick="show('A_users')"> <i class="material-icons g">add</i> <span>Add User</span> </div>
            <div class="button" onclick="show('S_users')"> <i class="material-icons g">lock</i> <span>setting password</span> </div>

        </div>

        <div class="center">
            <div class="view" id="V_users"> <i class="material-icons x" onclick="hide('V_users')"> close </i> 
    
        <table cellspacing="0" class="table ">
    <tr>
    <th>Name</th>
    <th>Location</th>
    <th>pass</th>
    <th>imag</th>
    <th>type</th>
    </tr>
	<?php
	     $s=user::getAlluser();
		 while ($row=$s->fetch())
		{
            
				echo "<tr>";
				echo "<td>{$row['name']}</td>";
				echo "<td>{$row['location']}</td>";
				echo "<td>{$row['pass']}</td>";
				echo "<td> {$row['image']}</td>";
				echo "<td>{$row['type']}</td>";
				echo "<td><form method='post'>";
				echo "<input type='hidden' value='{$row['name']}' name='username' />";
				echo "<input type='submit' value='Edit' name='edit' formaction='index.php'  class='btn btn-outline-info tab'>";
                echo "<input type='submit' value='Remove' name='remove' formaction='index.php' formmethod='post'  class='btn btn-outline-info tab'>";
				echo "</form></td>";
				echo "</tr>";		
		}		
	?> 
</table>
        
        
        </div>
            <div class="view" id="D_users"> <i class="material-icons x" onclick="hide('D_users')"> close </i>
                <form action="index.php" method="post">
                    <br>
                    <h3 class="head"> Delete User From Table </h3>
                    <br>
                    <br>
                    <div class="delete"> <i class="material-icons u">person</i>
                        <input type="text" name="userdelt" id="user" placeholder="Enter User Name  ">
                        <br>
                        <br>
                        <br>
                        <input onclick="show('D_users')"  type="submit" name="delete" value="delete"  class="btn btn-outline-danger del "> 
                    </div>
                   
                    
                </form>
                <br>
                <div class="msg" id="id1">
                    <h4 style="text-indent:10px ;" class="alert-heading">Well done!</h4>
                    <p id="error2">Aww yeah, you successfully delete user.</p>

                </div>

               
            </div>


            <div class="view" id="A_users"> <i class="material-icons x" onclick="hide('A_users')"> close </i>
            <h3 class="head"> Add New User </h3>
                <form action="index.php" method="post" style="width: fit-content;" enctype="multipart/form-data">
                    <br>
                    <div class="Add"> <i class="material-icons u">person</i>
                        <input type="text" name="username" id="username" placeholder="Enter User Name  ">
                        <br>
                        <br>
                        <i class="material-icons u">location_on</i>
                        <input type="text" name="userloc" id="useremail" placeholder="Enter Your Address ">
                        <br>
                        <br>
                        <i class="material-icons u">lock</i>
                        <input type="password" name="userpass" id="useremail" placeholder="Enter Your password ">
                        <br>
                        
                        <label id="lab" for="input" style="cursor: pointer; position: relative; top:-14px ;">
                            Select Image
                            <input type="file" id="input" name="imag" accept="image/jpeg, image/png, image/jpg">
                        </label>
                        
                        <div id="image" style="display:inline; "> <i class="material-icons photo" style=" margin-top:30px;">person</i> </div>
                        <br>
                        <br>
                        <br>
                        <input onclick="show('A_users')"  type="submit" name="add" value="Add"  class="btn btn-outline-danger del ">
                    </div>

                </form>
                <div class="msg add" id="id2">
                    <h4 style="text-indent:10px ;" class="alert-heading">Well done!</h4>
                    <p id="add">Aww yeah, you successfully delete user.</p>
                </div>

                
                


            </div>
            <div class="view" id="U_users"> <i class="material-icons x" onclick="hide('U_users')"> close </i>
                <h3 class="head"> Update User Information </h3>
                <form style="width: fit-content;" method="post" action="index.php" enctype="multipart/form-data">

                    <br>
                    <div class="update"> <i class="material-icons u">person</i>
                        <input type="text"  placeholder="Enter User Name"  name="username" id="username" value="<?php echo $res['name'];?>">
                        <br>
                        <br>
                        <i class="material-icons u">location_on</i>
                        <input type="text" name="userloc" id="userloc" value="<?php echo $res['location'];?>">
                        <br>
                        <br>
                        <i class="material-icons u">lock</i>
                        <input type="password" name="userpass" id="userpass" value="<?php echo $res['pass'];?>">
                        <br>
                        
                        <label id="lab" for="input" style="cursor: pointer; position: relative; top:-14px ;">
                            Select Image
                            <input type="file" id="input" name="imag"  value="<?php echo $res['image'];?>" accept="image/jpeg, image/png, image/jpg">
                        </label>
                        
                        <div id="image" style="display:inline; "> <i class="material-icons photo" style=" margin-top:30px;">person</i> </div>
                        <br>
                        <br>
                        <br>
                        <input onclick="show('U_users')"  type="submit" name="upd" value="Update"  class="btn btn-outline-danger del ">
                    </div>
                    
                </form>
                <div class="msg up" id="id3">
                    <h4 style="text-indent:10px ;" class="alert-heading">Well done!</h4>
                    <p id="up">Aww yeah, you successfully update user.</p>
                </div>




            </div>
            <div class="view" id="S_users"> <i class="material-icons x" onclick="hide('S_users')"> close </i>
                <br>
                <h3 class="head"> setting password </h3>
                <br>
                <br>
            <form action="index.php" method="post" id="my_form">
                <div class="delete"> <i class="material-icons u">person</i>
                    <input type="text" name="userset" id="user" placeholder="Enter User Name  ">
                </div>
                <br>
                <br>
                <div class="delete"> <i class="material-icons u">lock</i>
                    <input type="password" name="useropass" id="user" placeholder="Enter Old Password  ">
                </div>
                <br>
                <br>
                <div class="delete"> <i class="material-icons u">lock</i>
                    <input type="password" name="usernpass" id="user" placeholder="Enter New Password  ">
                </div>
                <br>
                <br>
                <br>
                <br>
                <div >
                <input type="submit" name="set"    class="btn btn-outline-danger  del" value ="Set">
                </div>
            </form>
                

                <div class="msg" id="id4"style="    margin-top: -156px;">
                    <h4 style="text-indent:10px ;" class="alert-heading">Well done!</h4>
                    <p id="errorset">Aww yeah, you successfully setting password.</p>

                </div>

                
            </div>

        </div>


    </div>



</body>

</html>