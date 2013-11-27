<?php 
	// print_r($_SERVER);
	if (isset($_GET['bonder_name'])) {
		$bonder_name = strtoupper($_GET['bonder_name']);
	}
	
	if (file_exists("IP." . $_SERVER['REMOTE_ADDR'] . ".txt")) {
		$file = file_get_contents("IP." . $_SERVER['REMOTE_ADDR'] . ".txt");
		$srvr = json_decode($file,true);
		if (isset($srvr['System_Name'])) {
			$name = $srvr['System_Name'];
			$hasName = true;
		}else{
			$name = 'No tiene nombre pero existe en la base de datos';
			$hasName = false;
		}
		if (isset($bonder_name)) {
			$_SERVER['System_Name'] = $bonder_name;
			$name = $bonder_name;
			$hasName = true;
			$server = json_encode($_SERVER);
			file_put_contents("IP." . $_SERVER['REMOTE_ADDR'] . ".txt", $server);
		}
	}else{
		if (isset($bonder_name)) {
			$_SERVER['System_Name'] = $bonder_name;
			$name = $bonder_name;
			$hasName = true;
			$server = json_encode($_SERVER);
			file_put_contents("IP." . $_SERVER['REMOTE_ADDR'] . ".txt", $server);
		}else{
			$name="No tiene nombre";
			$hasName = false;
			$server = json_encode($_SERVER);
		}
	}
?>