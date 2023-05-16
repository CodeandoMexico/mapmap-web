<?php
	//if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once('dbConnect.php');
		
		$sql ="SELECT id, imagen FROM imagenes ORDER BY id ASC";
		$res = mysqli_query($con,$sql);
		
		$path = $_SERVER["DOCUMENT_ROOT"]."/manage_img/uploads/";
		while($row = mysqli_fetch_array($res)){
			$id = $row['id'];
			$image = $row['imagen'];
			$actualpath = $path.$id.".png";
			
			file_put_contents($actualpath,base64_decode($image));
		}
		
		mysqli_close($con);
	//}else{
		//echo "Error";
	//}
?>