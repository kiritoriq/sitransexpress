<?php 
	Class Query {
		private $host = 'localhost';
		private $username = "root";
		private $pass = ""; //kalau sql nya ada password, maka dituliskan disini.
		private $db = "sipenba";
		private $port = 3308; //optional, tergantung port sql. kalau port sql = 3306 (default) maka tidak usah diberi port
		private $con;
		private $table;

		function __construct() {
			$this->connect();
		} 

		public function connect() {
			$this->con = mysqli_connect($this->host,$this->username,$this->pass,$this->db,$this->port) or die(mysqli_error());
		}

		public function selectAll($table) {
			$this->table = $table;
			$select = mysqli_query($this->con, "SELECT * FROM ".$this->table);
			return $select;
		}

		public function store($query) {
			$item = array();
			while($data = mysqli_fetch_row($query)){
				array_push($item, $data);
			}
			return $item;
		}

		public function query($query) {
			$exe = mysqli_query($this->con, $query);
			return $exe;
		}
	}	