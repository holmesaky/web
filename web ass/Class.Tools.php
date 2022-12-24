<?php
require_once("Class.Database.php");

class Tools
{
	static function cleanData($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	
	//static function printSuccess($message)
	//{
		//echo "<div class='alert alert-success alert-dismissable'>";
		//echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
	//	echo "<strong>Success!</strong>$message</div>";
	//}
	
	//static function printError($message)
	//{
		//echo "<div class='alert alert-danger alert-dismissable'>";
	//	echo "<a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
	//	echo "<strong>ERROR!</strong>$message</div>";
	//}
	static function printm($message,$elment)
	{
		echo "<script>
            window.onload = function msg() {
                var m=document.getElementById('$elment');
                m.innerHTML='Aww yeah, $message';
                
            }</script>";}
	
	
	static function show($elment){
		echo "<script>
            window.onload = function show() {
                var y = document.getElementById('$elment');
                y.style.display = 'block';
                
            }</script>";}
	
		}
?>