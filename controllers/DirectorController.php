<?php

    require_once('../../models/Director.php');
    require_once('../../env.php');


    function listDirectors() {
		
		$mysqli = initConnectionDb();
		$directorList = $mysqli->query("SELECT * FROM directors");
		
		$directorObjectArray = [];
		foreach($directorList as $directorItem) {
			$directorObject = new Director($directorItem['id'], $directorItem['name'],$directorItem['surnames'],$directorItem['date'],$directorItem['nationality']);
			array_push($directorObjectArray, $directorObject);
		}
		$mysqli->close();

		return $directorObjectArray;
	}

	function getDirectorData($idDirector) {

		$mysqli = initConnectionDb();
		$directorData = $mysqli->query("SELECT * FROM directors WHERE id=$idDirector");
		$directorObject = null;
		foreach($directorData as $directorItem) {
			$directorObject = new Director($$directorItem['id'], $directorItem['name'],$directorItem['surnames'],$directorItem['date'],$directorItem['nationality']);
			break;
		}
		$mysqli->close();
		return $directorObject;
	}

	function storeDirector ($directorName,$directorSurnames,$directorDate,$directorNationality) {
		$mysqli = initConnectionDb();

	   	$directorCreated = false;
	   	//TODO: comprobar que no exista una plataforma con el mismo nombre
	   	if ($resultadoInsert = $mysqli->query("INSERT INTO directors (name,surnames,date,nationality) values ('$directorName','$directorSurnames','$directorDate','$directorNationality')")) {
			$directorCreated = true;
		}

		$mysqli->close();

		return $directorCreated;
	}

	function deleteDirector($idDirector) {
		
		$mysqli = initConnectionDb();

		$directorDeleted = false;
		if ($resultado = $mysqli->query("DELETE FROM directors where id = $idDirector")) {
			$directorDeleted = true;
		}

		$mysqli->close();

		return $directorDeleted;
	}

	function updateDirector ($directorId,$directorName,$directorSurnames,$directorDate,$directorNationality) {
		
		$mysqli = initConnectionDb();


		$directorEdited = false;

	   	if ($resultadoUpdate = $mysqli->query("UPDATE directors set name = '$directorName',surnames='$directorSurnames',date='$directorDate',nationality='$directorNationality' where id =  $directorId")) {
			$directorEdited = true;
		}

		$mysqli->close();

		return $directorEdited;
	}


?>