<?php
	require_once('../../models/Platform.php');

	function initConnectionDb() {
		$db_host = 'localhost';
		$db_user = 'root';
		$db_password = 'root';
		$db_db = 'actividad_1';

		$mysqli = @new mysqli(
		    $db_host,
	    	$db_user,
	    	$db_password,
	    	$db_db
		);

		if ($mysqli->connect_error) {
		    die('Error: '.$mysqli->connect_error);
		}

		return $mysqli;
	}

	function listPlatforms() {

		$mysqli = initConnectionDb();
		$platformList = $mysqli->query("SELECT * FROM platforms");

		$platformObjectArray = [];
		foreach($platformList as $platformItem) {
			$platformObject = new Platform($platformItem['id'], $platformItem['name']);
			array_push($platformObjectArray, $platformObject);
		}
		$mysqli->close();

		return $platformObjectArray;
	}

	function getPlatformData($idPlatform) {

		$mysqli = initConnectionDb();
		$platformData = $mysqli->query("SELECT * FROM platforms WHERE id=$idPlatform");
		$platformObject = null;
		foreach($platformData as $platformItem) {
			$platformObject = new Platform($platformItem['id'], $platformItem['name']);
			break;
		}
		$mysqli->close();
		return $platformObject;
	}

	function storePlatform ($platformName) {
		$mysqli = initConnectionDb();

	   	$platformCreated = false;
	   	//TODO: comprobar que no exista una plataforma con el mismo nombre
	   	if ($resultadoInsert = $mysqli->query("INSERT INTO platforms (name) values ('$platformName')")) {
			$platformCreated = true;
		}

		$mysqli->close();

		return $platformCreated;
	}

	function updatePlatform ($platformId, $platformName) {
		$mysqli = initConnectionDb();

		$platformEdited = false;

	   	if ($resultadoUpdate = $mysqli->query("UPDATE platforms set name = '$platformName' where id =  $platformId")) {
			$platformEdited = true;
		}

		$mysqli->close();

		return $platformEdited;
	}

	function deletePlatform($platformId) {
		$mysqli = initConnectionDb();

		$platformDeleted = false;
		if ($resultado = $mysqli->query("DELETE FROM platforms where id = $platformId")) {
			$platformDeleted = true;
		}

		$mysqli->close();

		return $platformDeleted;
	}
?>
