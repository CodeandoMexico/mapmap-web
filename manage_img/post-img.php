<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//receive post
		$image = $_POST['imagen'];
		$nombreRoute = $_POST['name'];
		$description = $_POST['description'];
		$unit = $_POST['imei'];
		$stopsignal = $_POST['stopsignal'];
		
		$stopsignal_json = json_encode($_POST);
		
		/*send mail*/
		/*
		$to      = 'rolyceplq@gmail.com';
		$subject = 'Test variable';
		$message = $stopsignal_json;
		$headers = 'From: webmaster@example.com' . "\r\n" .
		'Reply-To: webmaster@example.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		
		mail($to, $subject, $message, $headers);
		*/
		/*end send mail*/
		
			
		//GET IMEI FROM TANSIT WAND
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 'http://transitwand.com/register?imei='.$unit);
		$result = curl_exec($ch);
		curl_close($ch);
		$obj = json_decode($result);
		$imei =  $obj->unitId;
		
		// OBTENER ID UNICO PARA NOMBRAR IMAGEN
		require_once('dbConnect.php');
	
		
		$sqlss ="SELECT id FROM routes ORDER BY id DESC LIMIT 1";
		$res = mysqli_query($con,$sqlss);
		
		$id = 0;
		
		while($row = mysqli_fetch_array($res)){
			$id = $row['id'];
		}
		
		$id = $id + 1;
		
		
		$path = $_SERVER["DOCUMENT_ROOT"]."/manage_img/uploads/".$id.".png";
		$pathImage = "";
		
		if($image == "not image load"){
			$pathImage = "No foto";
		}else{
			$pathImage = "http://codeandoxalapa.org/manage_img/uploads/".$id.".png";
			}
		
		$hoy = date("Y-m-d H:i:s"); 
		
		$sql = "INSERT INTO routes (id, unitID, nombreRoute, imagen, descripcion, dia) VALUES (0, '$imei', '$nombreRoute', '$pathImage', '$description', '$hoy')";
		
		if(mysqli_query($con,$sql)){
			if($pathImage != "No foto")
			{
				file_put_contents($path,base64_decode($image));
			}
			echo "Successfully Uploaded";
		}

		
		$last_id = mysqli_insert_id($con);
		echo $last_id;
		InsertStopSignal($_POST, $last_id , $con);
			
		mysqli_close($con);
	}else{
		echo "Error";
	}
	
	/*Insertar paradas - señalizadas*/
	
	function InsertStopSignal($post, $id, $con){
		$idroute = $post['name'];
		for($i=0; $i<$post['stopsAmount']; $i++){
			$dataStop = $post['stopsignal_'.$i];
			$dataarray = explode(",", $dataStop);
			$signal = substr($dataarray[0],1);
			$lng = substr($dataarray[2],0,-1);
			$latlng = $dataarray[1].','.$lng;
			
			$sql = "INSERT INTO stops (id,idRoute, idStop, stopsignal, latlng) VALUES ($id, '$idroute', $i, '$signal', '$latlng' )";
			echo $sql; 
			$result = mysqli_query($con,$sql);
			if($result == false) {
				 printf("error: %s\n", mysqli_error($con));
			}else {
				echo 'done.';
			}

		}
	}
	
?>