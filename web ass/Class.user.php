<?php
require_once("Class.Tools.php");
$count=0;
class user
{
	
	static function getAlluser()
	{
		$pdo=Database::connect();
		$query=$pdo->prepare("select * from user ");
		$query->execute();
		return $query;
	}
	
	static function getUser($name)
	{
		$pdo=Database::connect();
		$query=$pdo->prepare("select * from user  where user.name=?");
		$query->execute(array(Tools::cleanData($name)));
		return $query;
	}
	static function deleteUser($name)
	{
		$pdo=Database::connect();
		$query=$pdo->prepare("delete from user where user.name=? and user.type !=1");
		$query->execute(array(Tools::cleanData($name)));
		return $query;
		
	}	
	static function updateStudent($name,$email,$pass,$img)
	{
		
		$name=Tools::cleanData($name);
		$email=Tools::cleanData($email);
		$pass=Tools::cleanData($pass);

		$temp=explode(".",$img['name']);
		$temp=end($temp);
		$fileExtention=strtolower($temp);
		$c=rand(1,100);
	   $fileName=$c."img.".$fileExtention;

	 
		
	   	
       $pdo=Database::connect();
	   $query=$pdo->prepare("update user set  location=?, pass=?, image=? where name=?");
	   
	   if( $query->execute(array($email,$pass,$fileName,$name)))
	   move_uploaded_file($img['tmp_name'],"uploads/".$fileName);

	   
	   return $query;
	}	
		


	static function setpass($name,$npass)
	{
		$name=Tools::cleanData($name);
		//$email=Tools::cleanData($opass);
		$pass=Tools::cleanData($npass);
       $pdo=Database::connect();
	   $query=$pdo->prepare("update user set  pass=? where name=?");
	   return $query->execute(array($npass,$name));
	}
	static function adduser($name,$email,$pass,$img)
	{
		
	   $name=Tools::cleanData($name);
	   $email=Tools::cleanData($email);
	   $pass=Tools::cleanData($pass);
	   //$img=Tools::cleanData($img);


	   $temp=explode(".",$img['name']);
	   $temp=end($temp);
	   $fileExtention=strtolower($temp);
	   $c=rand(1,100);
	   $fileName= $c."img.".$fileExtention;
	   	
       $pdo=Database::connect();
	   $query=$pdo->prepare("insert into user values (?,?,?,?,?)");

	  if( $query->execute(array($name,$email,$pass,$fileName,2)))
		move_uploaded_file($img['tmp_name'],"uploads/".$fileName);
	  
	  return $query;
	}
	



}
?>