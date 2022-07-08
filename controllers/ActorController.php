<?php

    require_once('../../models/Actor.php');
    require_once('../../env.php');


    function listActors() {
		
		$mysqli = initConnectionDb();
		$actorList = $mysqli->query("SELECT * FROM actors");
		
		$actorObjectArray = [];
		foreach($actorList as $actorItem) {
			$actorObject = new Actor($actorItem['id'], $actorItem['name'],$actorItem['surnames'],$actorItem['date'],$actorItem['nationality']);
			array_push($actorObjectArray, $actorObject);
		}
		$mysqli->close();

		return $actorObjectArray;
	}

	function getActorData($idActor) {

		$mysqli = initConnectionDb();
		$actorData = $mysqli->query("SELECT * FROM actors WHERE id=$idActor");
		$actorObject = null;
		foreach($actorData as $actorItem) {
			$actorObject = new Actor($$actorItem['id'], $actorItem['name'],$actorItem['surnames'],$actorItem['date'],$actorItem['nationality']);
			break;
		}
		$mysqli->close();
		return $actorObject;
	}

	function storeActor ($actorName,$actorSurnames,$actorDate,$actorNationality) {
		$mysqli = initConnectionDb();

	   	$actorCreated = false;
	   	//TODO: comprobar que no exista una plataforma con el mismo nombre
	   	if ($resultadoInsert = $mysqli->query("INSERT INTO actors (name,surnames,date,nationality) values ('$actorName','$actorSurnames','$actorDate','$actorNationality')")) {
			$actorCreated = true;
		}

		$mysqli->close();

		return $actorCreated;
	}

	function deleteActor($idActor) {
		
		$mysqli = initConnectionDb();

		$actorDeleted = false;
		if ($resultado = $mysqli->query("DELETE FROM actors where id = $idActor")) {
			$actorDeleted = true;
		}

		$mysqli->close();

		return $actorDeleted;
	}

	function updateActor ($actorId,$actorName,$actorSurnames,$actorDate,$actorNationality) {
		
		$mysqli = initConnectionDb();


		$actorEdited = false;

	   	if ($resultadoUpdate = $mysqli->query("UPDATE actors set name = '$actorName',surnames='$actorSurnames',date='$actorDate',nationality='$actorNationality' where id =  $actorId")) {
			$actorEdited = true;
		}

		$mysqli->close();

		return $actorEdited;
	}


?>