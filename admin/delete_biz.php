<?php 

require_once("../include/connect.php"); 
session_start();

if(!isset($_SESSION['admin_log'])){
	redirect('login');
}

if(isset($_GET['delete_biz'])){
	$id = $_GET['delete_biz'];

	$query = runQuery("DELETE FROM records where b_id = '$id'");

	if($query){
		redirect('biz');
	}
	else{
		echo "not deleted";
	}
}

?>