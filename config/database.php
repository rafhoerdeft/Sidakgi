<?php  
	/**
	 * 
	 */
	class database{
		private $koneksi;

		function __construct(){
			include_once('koneksi.php');
			$this->koneksi = $conn;
			$this->db_name = $name;
		}


		public function query($sql=''){
	        return mysqli_query($this->koneksi, $sql);
		}

		function fetch_array($result) {
	        return mysqli_fetch_array($result);
	    }

	    function fetch_assoc($result) {
	        return mysqli_fetch_assoc($result);
	    }

	    function fetch_row($result) {
	        return mysqli_fetch_row($result);
	    }

	    function num_rows($result) {
	        return mysqli_num_rows($result);
	    }
	}
?>