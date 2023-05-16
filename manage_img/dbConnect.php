<?php 
	define('HOST','localhost');
	define('USER','root');
	define('PASS','r4IH5SLp');
	define('DB','db214512_mapaton');
	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect'. mysqli_error($con));

	 class DBController {
        private $host = "localhost";
        private $user = "root";
        private $password = "r4IH5SLp";
        private $database = "db214512_mapaton";
        private $conn;

        function __construct() {
            $this->conn = $this->connectDB();
        }

        function connectDB() {
            $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
            return $conn;
        }

        function runQuery($query) {
            $result = mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
            }		
            if(!empty($resultset))
                return $resultset;
        }

        function numRows($query) {
            $result  = mysqli_query($this->conn, $query);
            $rowcount = mysqli_num_rows($result);
            return $rowcount;	
        }

        function executeQuery($query) {
            $result  = mysqli_query($this->conn, $query);
            return $result;	
        }
    }
	
	//print_r($con);
	//phpinfo();
?>
