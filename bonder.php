<?php 

require 'vendor/autoload.php';

/**
*  Bonder Down Times
*/
class Bonder
{
	
	function __construct($ip,$help='')
	{
		$this->ip = $ip;
		$this->file = "IP." . $this->ip . ".js";
		if (!$this->bonder_exists() && $help != 'registering') {
			throw new Exception("Bonder_dont_exist, assosiate a bonder with: ". $this->ip , 1);
		} else {
			$this->filecontents = json_decode(file_get_contents($this->file),true);
		}
	}

	public function save_bonder_name($name)
	{
		$this->filecontents['name'] = $name;
		file_put_contents($this->file, json_encode($this->filecontents));
		echo $this->filecontents['name'];
	}

	public function get_bonder_data()
	{
		return json_encode($this->filecontents);
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
/*
 * Para hacer la interfaz REST todo esto estorba hasta cierto modo
 * Tratare de hacer que funcione si esto con cosas mas sencillas
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
} elseif (isset($_GET['action']) && $_GET['action'] !== '') {
	if (function_exists($_GET['action'])) {
		try {
			$_GET['action']();
		} catch (Exception $e) {
			echo '{"error":true,"desc":"Exception in: Get:[' . $_GET['action'] . '] with message: ' . $e->getMessage() . '"}';
		}
	} else {
		echo '{"error":true,"desc":"Exception in: Function Parser:[' . $_GET['action'] . '] with message: "Funcion no existe"}';
	}
} else {
		echo '{"error":true,"desc":"Exception in: Function [Parser] with message: "No se encontro el parametro [action]"}';
}
*/



function get_bonder_data()
{
	$bonder = new Bonder($_SERVER['REMOTE_ADDR']);
	echo $bonder->get_bonder_data();
}

function register()
{
	$bonder = new Bonder($_SERVER['REMOTE_ADDR'],'registering');
	$bonder->save_bonder_name($_GET['name']);
}