<?php 


/**
*  Bonder Down Times
*/
class Bonder
{
	
	function __construct($ip)
	{
		
		$this->ip = $ip;
		$this->file = "IP." . $this->ip . ".txt";
		if (!$this->bonder_exists()) {
			throw new Exception("Bonder_dont_exist, assosiate a bonder with: ". $this->ip , 1);
		}
	}

	public function save_bonder_name($name)
	{
		$this->save;
	}

	private function get_bonder_data()
	{
		return json_decode($this->file, true);
	}
	private function getName()
	{
		$this->bonder_exists();
	}

	private function bonder_exists()
	{
		return file_exists($this->file);
	}

}
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


if (isset($_POST['action']) && $_POST['action'] !== '') {
	if (function_exists($_POST['action'])) {
		try {
			$_POST['action']();
		} catch (Exception $e) {
			echo '{"error":true,"desc":"Exception in:Post: [' . $_POST['action'] . '] with message: ' . $e->getMessage() . '"}';
		}
	} else {
		echo '{"error":true,"desc":"Exception in: Function Parser:[' . $_GET['action'] . '] with message: "Funcion no existe"}';
	}
}
if (isset($_GET['action']) && $_GET['action'] !== '') {
	if (function_exists($_GET['action'])) {
		try {
			$_GET['action']();
		} catch (Exception $e) {
			echo '{"error":true,"desc":"Exception in: Get:[' . $_GET['action'] . '] with message: ' . $e->getMessage() . '"}';
		}
	} else {
		echo '{"error":true,"desc":"Exception in: Function Parser:[' . $_GET['action'] . '] with message: "Funcion no existe"}';
	}
}

function get_bonder_data()
{
	$bonder = new Bonder($_SERVER['REMOTE_ADDR']);
	echo $bonder->get_bonder_data();
}