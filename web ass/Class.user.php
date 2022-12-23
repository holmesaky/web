<?php
require_once("Class.Tools.php");

class user
{
	static function getAlluser()
	{
		$pdo=Database::connect();
		$query=$pdo->prepare("select * from user )");
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
		
	static function updateStudent($name,$email,$pass,$img)
	{
		$name=Tools::cleanData($name);
		$email=Tools::cleanData($email);
		$pass=Tools::cleanData($pass);
		$img=Tools::cleanData($img);
	   	
       $pdo=Database::connect();
	   $query=$pdo->prepare("update user set  email=?, pass=?, image=? where name=?");
	   return $query->execute(array($email,$pass,$image,$name));
	}	
		
	static function adduser($name,$email,$pass,$img)
	{
	   $name=Tools::cleanData($name);
	   $email=Tools::cleanData($email);
	   $pass=Tools::cleanData($pass);
	   $img=Tools::cleanData($img);
	   
	   	
       $pdo=Database::connect();
	   $query=$pdo->prepare("insert into user values (?,?,?,?,?)");
	   return $query->execute(array($name,$email,$pass,$img,2));
	}
	



}
?>