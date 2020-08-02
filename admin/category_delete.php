<?php 

require_once("../include/connect.php"); 
session_start();

if(!isset($_SESSION['admin_log'])){
	redirect('login');
}

if(isset($_GET['delete_cat'])){
	$id = $_GET['delete_cat'];

	$query = runQuery("DELETE FROM categories where cat_id = '$id'");

	if($query){
		redirect('category');
	}
	else{
		echo "not deleted";
	}
}

?>