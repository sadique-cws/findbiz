<?php 


$connect = mysqli_connect('localhost','root','','findbiz');

// to run and return boolean expression from database
function runQuery($query){
	global $connect;
	$run = mysqli_query($connect,$query);

	if($run){
		return true;
	}
	else{
		return false;
	}
}


// calling data as array from mysqli database
function callingQuery($query){
	global $connect;
	$array = array();
	$data = mysqli_query($connect,$query);
	while($row = mysqli_fetch_array($data)){
		$array[] = $row;
	}
	return $array;

}

// for check any query from database
function checkQuery($query){
	global $connect;
	$result = mysqli_query($connect,$query);
	$count = mysqli_num_rows($result);

	if($count > 0){
		return true;
	}
	else{
		return false;
	}
}

function redirect($page){
	echo "<script>window.open('$page.php','_self')</script>";
}

?>