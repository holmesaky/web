<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


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
if (isset($_POST['delete'])) {






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
            <div class="button" onclick="show('U_users')"> <i class="material-icons g">settings</i> <span>Update Information </span>
            </div>
            <div class="button" onclick="show('S_users')"> <i class="material-icons g">lock</i> <span>setting password</span> </div>

        </div>

        <div class="center">
            <div class="view" id="V_users"> <i class="material-icons x" onclick="hide('V_users')"> close </i> </div>
            <div class="view" id="D_users"> <i class="material-icons x" onclick="hide('D_users')"> close </i>
                <form>
                    <br>
                    <h3 class="head"> Delete User From Table </h3>
                    <br>
                    <br>
                    <div class="delete"> <i class="material-icons u">person</i>
                        <input type="text" name="userdelt" id="user" placeholder="Enter User Name  ">
                        <br>
                        <br>
                        <br>
                        
                        <input type="submit" value="delete"  class="btn btn-outline-danger del "> 
                    </div>
                   
                    
                </form>
                <br>
                <div class="msg">
                    <h4 style="text-indent:10px ;" class="alert-heading">Well done!</h4>
                    <p id="error2">Aww yeah, you successfully delete user.</p>

                </div>

               
            </div>



            <div class="view" id="A_users"> <i class="material-icons x" onclick="hide('A_users')"> close </i>
                <h3 class="head"> Add User To Table </h3>
                <button type="button" class="btn btn-outline-danger">Sign up</button>
                <div class="msg">
                    <h4 style="text-indent:10px ;" class="alert-heading">Well done!</h4>
                    <p id="error2">Aww yeah, you successfully delete user.</p>

                </div>


            </div>
            <div class="view" id="U_users"> <i class="material-icons x" onclick="hide('U_users')"> close </i>
                <h3 class="head"> Update User Information </h3>
                <form style="width: fit-content;">

                    <br>
                    <div class="update"> <i class="material-icons u">person</i>
                        <input type="text" name="username" id="username" placeholder="Enter User Name  ">
                        <br>
                        <br>
                        <i class="material-icons u">email</i>
                        <input type="text" name="useremail" id="useremail" placeholder="Enter Email ">
                        <br>
                        <br>
                        <label id="lab" for="input" style="cursor: pointer; position: relative; top:12px ;">
                            Select Image
                            <input type="file" id="input" name="imag" accept="image/jpeg, image/png, image/jpg">
                        </label>
                        <br>
                        <br>

                        <div id="image"> <i class="material-icons photo">person</i> </div>
                    </div>

                </form>
                <div class="msg up">
                    <h4 style="text-indent:10px ;" class="alert-heading">Well done!</h4>
                    <p id="error2">Aww yeah, you successfully delete user.</p>
                </div>




            </div>
            <div class="view" id="S_users"> <i class="material-icons x" onclick="hide('S_users')"> close </i>
                <br>
                <h3 class="head"> setting password </h3>
                <br>
                <br>
                <div class="delete"> <i class="material-icons u">lock</i>
                    <input type="password" name="userdelt" id="user" placeholder="Enter password  ">

                </div>

                </form>
                <br>

                <div class="msg">
                    <h4 style="text-indent:10px ;" class="alert-heading">Well done!</h4>
                    <p id="error2">Aww yeah, you successfully setting password.</p>

                </div>

                <button type="button" class="btn btn-outline-danger del ">Set</button>
            </div>

        </div>


    </div>



</body>

</html>