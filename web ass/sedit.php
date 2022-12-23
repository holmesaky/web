<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    
<title>Untitled Document</title>
</head>

<body>
<div class="container">
<?php
	require_once("Class.Student.php");
	require_once("Class.Faculty.php");

	if(!empty($_POST['submit'])&& $_POST['submit']=='Save')
	{
		
		$test=Student::updateStudent($_POST['sid'],$_POST['sname'],$_POST['sadd'],$_POST['scol'],$_POST['bDate']);
		
		if($test)
		{
			Tools::printSuccess("Updated Successfully <a href ='index.php'>Go back</a>");  		}
		else
		{
			Tools::printError("Updated Failed <a href ='index.php'>Go back</a>");
		}
		  
	}
	
	
	$stuInfo=Student::getStudent($_POST['sid']);
	$row=$stuInfo->fetch();
	?>


<div >
 <form method="post" name="myform">
        
            <div class="form-group">
                <label class="control-label">Student ID:</label>
                <input readonly="readonly" type="text" name="sid" required id='sid' class="form-control" placeholder="student id" value="<?php echo $row['id'];?>">
            </div>
            
            <div class="form-group">
                <label class="control-label">Student Name:</label>
                <input type="text" name="sname" required class="form-control" value="<?php echo $row['name'];?>">
            </div>
            
            <div class="form-group">
                <label class="control-label">Birth Date</label>
                <input type="text" name="bDate" required class="form-control" value="<?php echo $row['birthDate'];?>">
            </div>
            
            <div class="form-group">
                <label class="control-label">Student address:</label>
                <input type="text" name="sadd" class="form-control" value="<?php echo $row['address'];?>">
            </div>
            
            <div class="form-group">
            <label class="control-label">Coll:</label>
            
            <select name="scol" class="form-control">
            <?php
			    echo "<option value='{$row['fid']}'>{$row['fName']}</option>";
				
				$info=Faculty::getAllFaculties();
				while($fRow=$info->fetch())
				echo "<option value='{$fRow['fid']}'>{$fRow['fName']}</option>";
			?>
            </select>
            </div>
            
            <div class="form-group">
            <input type="submit" name="submit" value="Save" class="btn btn-success">
            </div>
        </form>
</div>
</body>
</html>