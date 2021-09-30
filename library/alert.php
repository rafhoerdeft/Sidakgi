<?php 	
	/**
	 * 
	 */
	class Alert {
		
		function alert_success($text){
			$alert =  "<div class='alert alert-success'> 
		                    <i class='mdi mdi-check-circle'></i> <b>Success!</b> $text
		                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
		                </div>";
		    return $alert;
		}

	
		function alert_failed($text){
			$alert =  "<div class='alert alert-danger'> 
		                    <i class='mdi mdi-close-circle'></i> <b>Gagal!</b> $text
		                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
		                </div>";
		    return $alert;
		}

	
		function alert_warning($text){
			$alert =  "<div class='alert alert-warning'> 
		                    <i class='mdi mdi-alert-circle'></i> <b>Peringatan!</b> $text
		                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
		                </div>";
		    return $alert;
		}
	}
?>