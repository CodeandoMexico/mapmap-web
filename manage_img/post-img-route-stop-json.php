<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$contentType = explode(';', $_SERVER['CONTENT_TYPE']); // Check all available Content-Type

	$rawBody = file_get_contents("php://input"); // Read body
	$data = array(); // Initialize default data array

	if(in_array('application/json', $contentType)) { // Check if Content-Type is JSON
		$data = json_decode($rawBody); // Then decode it
		$dataArray = json_decode($rawBody, true); // Converting to an array
		
		$image = $data->imagen;
		$nombreRoute = $data->name;
        $description = $data->description;
        $unit = $data->imei;
        $stopsignal = $data->stopsignal;
		
		//GET IMEI FROM TANSIT WAND
		$result = file_get_contents('https://mapaton.org/mapmap/register?imei='.$unit);
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

        if($image == "not image load")
        {
                $pathImage = "No foto";
        }else{
            $pathImage = "https://mapaton.org/manage_img/uploads/".$id.".png";
        }

        $hoy = date("Y-m-d H:i:s");

        $sql = "INSERT INTO routes (id, unitID, nombreRoute, imagen, descripcion, dia) VALUES ($id, '$imei', '$nombreRoute', '$pathImage', '$description', '$hoy')";

        if(mysqli_query($con,$sql))
        {
            if($pathImage != "No foto")
            {
            	file_put_contents($path,base64_decode($image));
            }
            echo "Successfully Uploaded";
            InsertStopSignal($dataArray, $id , $con);
        }
		
	}else{
		echo "no es json";
	}

}
else{
	echo "La peticiión no es POST <br />";
}

/*Insertar paradas - señalizadas*/

function InsertStopSignal($data, $id, $con){
    $idroute = $data['name'];
    for($i=0; $i < $data['stopsAmount']; $i++)
    {
        $dataStop = $data['stopsignal_'.$i];
        $dataarray = explode(",", $dataStop);
        $signal = substr($dataarray[0],1);
        if($signal === "true" || $signal === true){
            $signal = 1;
        }
        else if ($signal === "false" || $signal === false){
            $signal = 0;
        }
        $lng = substr($dataarray[2],0,-1);
        $latlng = $dataarray[1].','.$lng;
        $sql = "INSERT INTO stops (id,idRoute, idStop, stopsignal, latlng) VALUES ($id, '$idroute', $i, '$signal', '$latlng')";
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