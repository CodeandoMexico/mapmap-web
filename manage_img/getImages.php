<?php
	header('Content-Type: text/html; charset=UTF-8');
	require_once('dbConnect.php');
	
	$sql = "select nombreRoute, id, imagen, descripcion from routes";
	
	$res = mysqli_query($con,$sql);
	
	$result = array();
	$paths = "";
	
	while($row = mysqli_fetch_array($res)){
		if($row['imagen'] == "No foto")
		{
			$paths = "No foto";
		}else{
			$paths = "http://mapaton.org/manage_img/uploads/".$row['id'].".png";
		}
		
		array_push(
			$result,array('nombreRoute'=>$row['nombreRoute'],'url'=>$paths,'descripcion'=>$row['descripcion'])
		);
	}
	
	echo json_encode(array("result"=>$result));
	
	mysqli_close($con);
?>