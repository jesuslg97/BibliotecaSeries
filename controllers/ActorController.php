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
			$actorObject = new Actor($actorItem['id'], $actorItem['name'],$actorItem['surnames'],$actorItem['date'],$actorItem['nationality']);
			break;
		}
		$mysqli->close();
		return $actorObject;
	}

	function storeActor ($actorName,$actorSurnames,$actorDate,$actorNationality) {
		$actorCreated = false;
		if(actorValidate($actorName,$actorSurnames,$actorDate,$actorNationality)){

			$mysqli = initConnectionDb();
			$exist = false;
			
			$actorData = $mysqli->query("SELECT * FROM actors WHERE name='$actorName' and surnames='$actorSurnames' and date = '$actorDate' and nationality = '$actorNationality'");
			foreach($actorData as $actorItem) {
				$exist = true;
				break;
			}
						
			if(!$exist){
		
			
				if ($resultadoInsert = $mysqli->query("INSERT INTO actors (name,surnames,date,nationality) values ('$actorName','$actorSurnames','$actorDate','$actorNationality')")) {
					$actorCreated = true;
				}
			}

			$mysqli->close();
		}

		return $actorCreated;
	}

	function deleteActor($idActor) {
		
		$mysqli = initConnectionDb();

		$actorDeleted = false;
		if ($resultado = $mysqli->query("DELETE FROM actors where id = $idActor")) {

			$mysqli->query("DELETE FROM serie_actors where actor_id = $idActor");

			$actorDeleted = true;
		}

		$mysqli->close();

		return $actorDeleted;
	}

	function updateActor ($actorId,$actorName,$actorSurnames,$actorDate,$actorNationality) {
		$actorCreated = false;
		if(actorValidate($actorName,$actorSurnames,$actorDate,$actorNationality)){
			$mysqli = initConnectionDb();


			

			if ($resultadoUpdate = $mysqli->query("UPDATE actors set name = '$actorName',surnames='$actorSurnames',date='$actorDate',nationality='$actorNationality' where id =  $actorId")) {
				$actorEdited = true;
			}

			$mysqli->close();
		}

		return $actorEdited;
	}

	function getSerieActor($serieId){
		
		$mysqli = initConnectionDb();
		$actorData = $mysqli->query("SELECT a.id,a.name,a.surnames,a.date,a.nationality FROM actors a inner join serie_actors sa on a.id = sa.actor_id WHERE sa.serie_id=$serieId");
		
		$actorObjectArray = [];
		foreach($actorData as $actorItem) {
			$actorObject = new Actor($actorItem['id'], $actorItem['name'],$actorItem['surnames'],$actorItem['date'],$actorItem['nationality']);
			array_push($actorObjectArray, $actorObject);
		}
		$mysqli->close();
		

		return $actorObjectArray;
	}

	function actorValidate($actorName,$actorSurnames,$actorDate,$actorNationality){
		if(is_string($actorName) && is_string($actorSurnames) && validateDateActor($actorDate) && is_null($actorNationality)){
			return true;
		}else{
			return false;
		}
	}

	function validateDateActor($date, $format = 'Y-m-d')
	{	
		
		$d = DateTime::createFromFormat($format, $date);

		return $d && $d->format($format) == $date;
	}


?>