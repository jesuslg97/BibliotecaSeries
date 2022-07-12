<?php

    require_once('../../models/Nationality.php');
    require_once('../../env.php');


    function listNationalities() {
        
		$mysqli = initConnectionDb();
		$nationalityList = $mysqli->query("SELECT * FROM nationalities");
       
		$nationalityObjectArray = [];
		foreach($nationalityList as $nationalityItem) {
			$nationalityObject = new Nationality($nationalityItem['id'], $nationalityItem['name']);
			array_push($nationalityObjectArray, $nationalityObject);
		}
		$mysqli->close();

		return $nationalityObjectArray;
	}

	function getNationalityData($idNationality) {

		$mysqli = initConnectionDb();
		$nationalityData = $mysqli->query("SELECT * FROM nationalities WHERE id=$idNationality");
		$nationalityObject = null;
		foreach($nationalityData as $nationalityItem) {
			$nationalityObject = new Nationality($nationalityItem['id'], $nationalityItem['name']);
			break;
		}
		$mysqli->close();
		return $nationalityObject;
	}

    function storeNationality ($nationalityName) {
		$nationalityCreated = false;
		if(validate($nationalityName)){
			$mysqli = initConnectionDb();
			$exist = false;

			$nationalityData = $mysqli->query("SELECT * FROM nationalities WHERE name='$nationalityName'");
			foreach($nationalityData as $nationalityItem) {
				$exist = true;
				break;
			}
			if(!$exist){
			
			
				if ($resultadoInsert = $mysqli->query("INSERT INTO nationalities (name) values ('$nationalityName')")) {
					$nationalityCreated = true;
				}
			}

			$mysqli->close();
		}

		return $nationalityCreated;
	}

    function deleteNationality($idNationality) {
		$mysqli = initConnectionDb();

		$nationalityDeleted = false;
		if ($resultado = $mysqli->query("DELETE FROM nationalities where id = $idNationality")) {
			$nationalityDeleted = true;
		}

		$mysqli->close();

		return $nationalityDeleted;
	}

	function validate($nationalityName){
		if(is_string($nationalityName)){
			return true;
		}else{
			return false;
		}
	}

?>