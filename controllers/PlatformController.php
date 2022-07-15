<?php
	require_once('../../models/Platform.php');
	require_once('../../env.php');
	

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
		$platformCreated = false;
		if(validate($platformName)){

		
			$mysqli = initConnectionDb();
			$exist = false;
			
			$platformData = $mysqli->query("SELECT * FROM platforms WHERE name='$platformName'");
			foreach($platformData as $platformItem) {
				$exist = true;
				break;
			}
						
			if(!$exist){
				if ($resultadoInsert = $mysqli->query("INSERT INTO platforms (name) values ('$platformName')")) {
					
					$platformCreated = true;
				}
			}
			
			
			$mysqli->close();
		}

		return $platformCreated;
	}

	function updatePlatform ($platformId, $platformName) {
		$platformEdited = false;
		if(validate($platformName)){
			$mysqli = initConnectionDb();
			$exist = false;
			
			$platformData = $mysqli->query("SELECT * FROM platforms WHERE name='$platformName'");
			foreach($platformData as $platformItem) {
				$exist = true;
				break;
			}
			if(!$exist){
				if ($resultadoUpdate = $mysqli->query("UPDATE platforms set name = '$platformName' where id =  $platformId")) {
					$platformEdited = true;
				}
			}

			$mysqli->close();
		}
		return $platformEdited;
	}

	function deletePlatform($platformId) {
		$mysqli = initConnectionDb();

		$platformDeleted = false;
		if ($resultado = $mysqli->query("DELETE FROM platforms where id = $platformId")) {

			$serieList = $mysqli->query("SELECT * FROM series where platform = $platformId");
			
			foreach($serieList as $serie){
				$id = $serie['id'];

				$mysqli->query("DELETE FROM series where id = $id");

				$mysqli->query("DELETE FROM serie_actors where serie_id = $id");
				
            	$mysqli->query("DELETE FROM serie_languages where serie_id = $id");
			}

			$platformDeleted = true;
		}

		$mysqli->close();

		return $platformDeleted;
	}

	function validate($platformName){
		if(is_string($platformName)){
			return true;
		}else{
			return false;
		}
	}
?>
