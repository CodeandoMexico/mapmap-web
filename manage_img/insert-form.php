<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: POST, GET");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require_once('dbConnect.php');
		// OBTENER ID UNICO PARA NOMBRAR IMAGEN
		$vipPackage = $_POST[vipPackage];
		
		$sqlss ="SELECT `sales-code` as id FROM sales_code WHERE `sales-code-description`='".$vipPackage."'";
		$res = mysqli_query($con,$sqlss);
		
		$salesCode = 0;
		
		while($row = mysqli_fetch_array($res)){
			$salesCode = $row['id'];
		}
		$salesCode = intval($salesCode) + 1;
		$salesCodeFormat = str_pad($salesCode, 6, '0', STR_PAD_LEFT);
		
		$string = "";
		if($vipPackage=="VIP PACKAGE N1"){
			$string = "N1";
		}else if($vipPackage=="VIP PACKAGE N2"){
			$string = "N2";
		}else{
			$string = "N3";
		}
		$salesCodeFormat = $string.$salesCodeFormat;
		$firstName = $_POST[firstName];
		$lastName = $_POST[lastName];
		$numberPassport = $_POST[numberPassport];
		$nationality = $_POST[nationality];
		$eMail = $_POST[eMail];
		$phone = $_POST[phone];
		$address = $_POST[address];
		$city = $_POST[city];
		$country = $_POST[country];
		$arrivalDate = $_POST[arrivalDate];
		$arrivalNumber = $_POST[arrivalNumber];
		$arrivalTime = $_POST[arrivalTime];
		$departureDate = $_POST[departureDate];
		$departureNumber = $_POST[departureNumber];
		$departureTime = $_POST[departureTime];
		$firstNameGuest = $_POST[firstNameGuest];
		$lastNameGuest = $_POST[lastNameGuest];
		$numberPassportGuest = $_POST[numberPassportGuest];
		$nationalityGuest = $_POST[nationalityGuest];
		$eMailGuest = $_POST[eMailGuest];
		$phoneGuest = $_POST[phoneGuest];
		$addressGuest = $_POST[addressGuest];
		$cityGuest = $_POST[cityGuest];
		$countryGuest = $_POST[countryGuest];
		$arrivalDateGuest = $_POST[arrivalDateGuest];
		$arrivalNumberGuest = $_POST[arrivalNumberGuest];
		$arrivalTimeGuest = $_POST[arrivalTimeGuest];
		$departureDateGuest = $_POST[departureDateGuest];
		$departureNumberGuest = $_POST[departureNumberGuest];
		$departureTimeGuest = $_POST[departureTimeGuest];
		//date_default_timezone_set('America/Mexico_City');
    	$momento = date("Y-m-d H:i");
		
		
		$sql = "INSERT INTO form (`form-id`,`sales-code`, `vip-package`, `first-name`, `last-name`, `number-passport`, `nationality`, `e-mail`, `phone`, `address`, `city`, `country`, `arrival-date`, `arrival-number`, `arrival-time`, `departure-date`, `departure-number`, `departure-time`, `first-name-guest`, `last-name-guest`, `number-passport-guest`, `nationality-guest`, `e-mail-guest`, `phone-guest`, `address-guest`, `city-guest`, `country-guest`, `arrival-date-guest`, `arrival-number-guest`, `arrival-time-guest`, `departure-date-guest`, `departure-number-guest`, `departure-time-guest`, `registration-date`) VALUES (0, '$salesCodeFormat', '$vipPackage', '$firstName', '$lastName', '$numberPassport', '$nationality', '$eMail', '$phone', '$address', '$city', '$country', '$arrivalDate', '$arrivalNumber', '$arrivalTime', '$departureDate', '$departureNumber', '$departureTime', '$firstNameGuest', '$lastNameGuest', '$numberPassportGuest', '$nationalityGuest', '$eMailGuest', '$phoneGuest', '$addressGuest', '$cityGuest', '$countryGuest', '$arrivalDateGuest', '$arrivalNumberGuest', '$arrivalTimeGuest', '$departureDateGuest', '$departureNumberGuest', '$departureTimeGuest', '$momento' )";
		
		$result = mysqli_query($con,$sql);
		if($result == false) {
			 printf("error: %s\n", mysqli_error($con));
		}else {
			$sql2 = "UPDATE `sales_code` set `sales-code`='".$salesCode."' WHERE `sales-code-description`='".$vipPackage."'";
			mysqli_query($con,$sql2);
			echo $salesCodeFormat;
		}
	}else if($_SERVER['REQUEST_METHOD']=='GET'){
		require_once('dbConnect.php');
		function escape_to_html($dirty){
			return htmlspecialchars($dirty, ENT_QUOTES, 'UTF-8');
		}
		$sql = "SELECT * FROM form";
    
        $res = mysqli_query($con,$sql);
        if($res->num_rows>0){
				$test =  "<table>";
             	$test .=  "<thead>";
                $test .=  "<tr>";
                //$test .=  "<td>Identificador Evaluaci&oacute;n</td>"; 
				$test .=  "<td>Sales code</td>"; 
                $test .=  "<td>VIP package</td>";  
                $test .=  "<td>First name guest 1</td>"; 
				$test .=  "<td>Last nale guest 1</td>"; 
                $test .=  "<td>Number of passport or id guest 1</td>";          
                $test .=  "<td>Nationality guest 1</td>";             
                $test .=  "<td>E-mail guest 1</td>"; 
				$test .=  "<td>Phone guest 1</td>"; 
				$test .=  "<td>Address guest 1/td>";
				$test .=  "<td>City guest 1</td>";
				$test .=  "<td>Country guest 1</td>";
				$test .=  "<td>Arrival date guest 1</td>";
				$test .=  "<td>Arrival flight number guest 1</td>";
				$test .=  "<td>Arrival time guest 1</td>";
				$test .=  "<td>Departure date guest 1</td>";
				$test .=  "<td>Departure flight number guest 1</td>";
				$test .=  "<td>Departure time guest 1</td>";
				$test .=  "<td>First name guest 2</td>"; 
				$test .=  "<td>Last nale guest 2</td>"; 
                $test .=  "<td>Number of passport or id guest 2</td>";          
                $test .=  "<td>Nationality guest 2</td>";             
                $test .=  "<td>E-mail guest 2</td>"; 
				$test .=  "<td>Phone guest 2</td>";
				$test .=  "<td>Address guest 2<td>";
				$test .=  "<td>City guest 2</td>";
				$test .=  "<td>Country guest 2</td>";
				$test .=  "<td>Arrival date guest 2</td>";
				$test .=  "<td>Arrival flight number guest 2</td>";
				$test .=  "<td>Arrival time guest 2</td>";
				$test .=  "<td>Departure date guest 2</td>";
				$test .=  "<td>Departure flight number guest 2</td>";
				$test .=  "<td>Departure time guest 2</td>";
				$test .=  "<td>Registration date</td>";
                $test .=  "</tr>";            
                $test .=  "</thead>";             
                $test .=  "<tbody>";
				while($row = mysqli_fetch_array($res)){
					$test .=  '<tr>';
					$test .=  '<td> '.utf8_encode($row['sales-code']).' </td>';
                    $test .=  '<td>'.utf8_encode($row['vip-package']).'</td>';
                    $test .=  '<td>'.utf8_encode($row['first-name']).'</td>';
					$test .=  '<td>'.utf8_encode($row['last-name']).'</td>';
                    $test .=  '<td>'.utf8_encode($row['number-passport']).'</td>';
                    $test .=  '<td>'.utf8_encode($row['nationality']).'</td>';
                    $test .=  '<td>'.utf8_encode($row['e-mail']).'</td>';
					$test .=  '<td>'.utf8_encode($row['phone']).'</td>';
					$test .=  '<td>'.utf8_encode($row['address']).'</td>';
					$test .=  '<td>'.utf8_encode($row['city']).'</td>';
					$test .=  '<td>'.utf8_encode($row['country']).'</td>';
					$test .=  '<td>'.utf8_encode($row['arrival-date']).'</td>';
					$test .=  '<td>'.utf8_encode($row['arrival-number']).'</td>';
					$test .=  '<td>'.utf8_encode($row['arrival-time']).'</td>';
					$test .=  '<td>'.utf8_encode($row['departure-date']).'</td>';
					$test .=  '<td>'.utf8_encode($row['departure-number']).'</td>';
					$test .=  '<td>'.utf8_encode($row['departure-time']).'</td>';
					$test .=  '<td>'.utf8_encode($row['first-name-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['last-name-guest']).'</td>';
                    $test .=  '<td>'.utf8_encode($row['number-passport-guest']).'</td>';
                    $test .=  '<td>'.utf8_encode($row['nationality-guest']).'</td>';
                    $test .=  '<td>'.utf8_encode($row['e-mail-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['phone-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['address-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['city-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['country-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['arrival-date-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['arrival-number-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['arrival-time-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['departure-date-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['departure-number-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['departure-time-guest']).'</td>';
					$test .=  '<td>'.utf8_encode($row['registration-date']).'</td>';
					$test .= '</tr>';
				}
				$test .=  "</tbody>";   
                $test .=  "</table>";
       		echo $test;
		}else{
			echo "there are no records";
		}
		
	}
?>