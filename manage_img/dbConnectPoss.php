<table>
	<tbody>
<?php
	// get all departments
	//$sql_get_depts = "SELECT ST_AsText('0101000020E610000073124A5F08A153C047D1DA9F51DBCCBF') as point";
	$test =  "<table>";
	$test .=  "<thead>";
	$test .=  "<tr>";
	$test .=  "<td>C&oacute;digo</td>";  
	$test .=  "<td>Ruta</td>"; 
	$test .=  "<td>Imagen</td>";  
	$test .=  "<td>Coordenadas</td>";                
	$test .=  "</tr>";            
	$test .=  "</thead>";             
	$test .=  "<tbody>";    
	$dato = $_GET['i'];
	$sql_get_depts = "select id from phone where unitid='".$dato."'";
	try{
		$dbh = new PDO('pgsql:host=localhost;port=5432;dbname=transit_wand;user=postgres;password=123');
	 	$stmt = $dbh->query($sql_get_depts);
	 	if($stmt === false){
	 		die("Error executing the query: $sql_get_depts");
	 	}
	}catch (PDOException $e){
		echo $e->getMessage();
	}
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : 
		$phone_id = $row['id'];
	endwhile;


	$sql_get_depts1 = "select id,routelongname from route where phone_id=$phone_id";
	try{
		//$dbh = new PDO('pgsql:host=localhost;port=5432;dbname=transit_wand;user=postgres;password=123');
	 	$stmt1 = $dbh->query($sql_get_depts1);
	 	if($stmt1 === false){
	 		die("Error executing the query: $sql_get_depts1");
	 	}
	}catch (PDOException $e){
		echo $e->getMessage();
	}
	while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) : 
		$route_id = $row1['id'];
		$route_name = $row1['routelongname'];
		$sql_get_depts2 = "select id from trippattern where route_id=$route_id";
		try{
			//$dbh = new PDO('pgsql:host=localhost;port=5432;dbname=transit_wand;user=postgres;password=123');
			$stmt2 = $dbh->query($sql_get_depts2);
			if($stmt2 === false){
				die("Error executing the query: $sql_get_depts2");
			}
		}catch (PDOException $e){
			echo $e->getMessage();
		}
		while($row12 = $stmt2->fetch(PDO::FETCH_ASSOC)) : 
			$trip_id = $row12['id'];
			$sql_get_depts3 = "select stop_id from trippatternstop where pattern_id=$trip_id";
			try{
				//$dbh = new PDO('pgsql:host=localhost;port=5432;dbname=transit_wand;user=postgres;password=123');
				$stmt3 = $dbh->query($sql_get_depts3);
			if($stmt3 === false){
					die("Error executing the query: $sql_get_depts3");
				}
			}catch (PDOException $e){
				echo $e->getMessage();
			}
			while($row13 = $stmt3->fetch(PDO::FETCH_ASSOC)) : 
				$stop_id = $row13['stop_id'];
				$sql_get_depts4 = "select location from stop where id=$stop_id";
				try{
					//$dbh = new PDO('pgsql:host=localhost;port=5432;dbname=transit_wand;user=postgres;password=123');
					$stmt4 = $dbh->query($sql_get_depts4);
				if($stmt4 === false){
						die("Error executing the query: $sql_get_depts4");
					}
				}catch (PDOException $e){
					echo $e->getMessage();
				}
				while($row14 = $stmt4->fetch(PDO::FETCH_ASSOC)) : 
					$location = $row14['location'];
					$sql_get_depts5 = "SELECT ST_AsText('".$location."') as point";
					try{
						//$dbh = new PDO('pgsql:host=localhost;port=5432;dbname=transit_wand;user=postgres;password=123');
						$stmt5 = $dbh->query($sql_get_depts5);
					if($stmt5 === false){
							die("Error executing the query: $sql_get_depts5");
						}
					}catch (PDOException $e){
						echo $e->getMessage();
					}
					while($row45 = $stmt5->fetch(PDO::FETCH_ASSOC)) : 
						 
						imprimirDatos($row45['point'],$route_name,$dato);
					endwhile;
					
				endwhile;

			endwhile;
			
		endwhile;

	endwhile;
	function imprimirDatos($point,$ruta,$dato){
		require_once('dbConnect.php');
		$str = str_replace("POINT(", "", $point, $count);
		$str1 = str_replace(")", "", $str, $str3);
		$porciones = explode(" ", $str1);
		$lat = $porciones[0];
		$lng = $porciones[1];
		//echo "lat".$lat."-lng".$lng.$ruta."<br>";
		$sqlss ="SELECT routes.imagen as imagen,stops.latlng as latlng FROM routes,stops WHERE stops.id=routes.id and stops.stopsignal=1 and stops.latlng like '%".$lng."%'";
		$db_handle = new DBController();
        $result = $db_handle->runQuery($sqlss);
		
		
		foreach($result as $k=>$v) {
			$porciones1 = explode(",", $result[$k]["latlng"]);
			$test .=  '<tr>';
			$test .=  '<td>'.utf8_encode($dato).'</td>';
			$test .=  '<td>'.utf8_encode($ruta).'</td>';
			$test .=  '<td>'.$result[$k]["imagen"].'</td>';
			$test .=  '<td>'.$porciones1[0].'</td>';
			$test .=  '<td>'.$porciones1[1].'</td>';
			$test .=  '</tr>';
		}
		echo $test;
	}
?>
		</tbody>
	</table>