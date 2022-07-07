<?php

    require_once('../../models/Language.php');
	require_once('../../env.php');

    function listLanguages() {

		$mysqli = initConnectionDb();
		$languageList = $mysqli->query("SELECT * FROM languages");
       
		$languageObjectArray = [];
		foreach($languageList as $languageItem) {
			$languageObject = new Language($languageItem['id'], $languageItem['name'],$languageItem['ISOcode']);
			array_push($languageObjectArray, $languageObject);
		}
		$mysqli->close();

		return $languageObjectArray;
	}

    function getLanguageData($idLanguage) {

		$mysqli = initConnectionDb();
		$languageData = $mysqli->query("SELECT * FROM languages WHERE id=$idLanguage");
		$languageObject = null;
		foreach($languageData as $languageItem) {
			$languageObject = new Language($languageItem['id'], $languageItem['name'],$languageItem['ISOcode']);
			break;
		}
		$mysqli->close();
		return $languageObject;
	}

    function storeLanguage ($languageName,$languageISO) {
		$mysqli = initConnectionDb();

	   	$languageCreated = false;
	   	//TODO: comprobar que no exista una plataforma con el mismo nombre
	   	if ($resultadoInsert = $mysqli->query("INSERT INTO languages (name,isocode) values ('$languageName','$languageISO')")) {
			$languageCreated = true;
		}

		$mysqli->close();

		return $languageCreated;
	}

    function updateLanguage ($languageId, $languageName, $languageISO) {
		$mysqli = initConnectionDb();

		$languageEdited = false;

	   	if ($resultadoUpdate = $mysqli->query("UPDATE languages set name = '$languageName', isoCode = '$languageISO' where id =  $languageId")) {
			$languageEdited = true;
		}

		$mysqli->close();

		return $languageEdited;
	}

    function deleteLanguage($idLanguage) {
		$mysqli = initConnectionDb();

		$languageDeleted = false;
		if ($resultado = $mysqli->query("DELETE FROM languages where id = $idLanguage")) {
			$languageDeleted = true;
		}

		$mysqli->close();

		return $languageDeleted;
	}
?>