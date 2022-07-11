<?php

    require_once('../../models/Serie.php');
    require_once('../../env.php');


    function listSeries() {

		$mysqli = initConnectionDb();
		$serieList = $mysqli->query("SELECT * FROM series");

		$serieObjectArray = [];
		foreach($serieList as $serieItem) {
			$serieObject = new Serie($serieItem['id'], $serieItem['title'],$serieItem['platform'],$serieItem['director']);
			array_push($serieObjectArray, $serieObject);
		}
		$mysqli->close();

		return $serieObjectArray;
	}

    function storeSerie($serieTitle,$seriePlatform,$serieDirector,$serieActors,$serieAudios,$serieSubtitles){
        
        $mysqli = initConnectionDb();

        $serieCreated = false;
        //TODO: comprobar que no exista una plataforma con el mismo nombre
        if ($resultadoInsert = $mysqli->query("INSERT INTO series (title,platform,serie) values ('$serieTitle','$seriePlatform','$serieDirector')")) {
            $id = mysqli_insert_id($mysqli);


            foreach($serieActors as $actor){
                $mysqli->query("INSERT INTO serie_actors (serie_id,actor_id) values ('$id','$actor')");
            }
    
            foreach($serieAudios as $audio){
                $mysqli->query("INSERT INTO serie_series (serie_id,serie_id,type) values ('$id','$audio','audio')");
            }
    
            foreach($serieSubtitles as $subtitles){
                $mysqli->query("INSERT INTO serie_series (serie_id,serie_id,type) values ('$id','$subtitles','subtitle')");
            }


            $serieCreated = true;
        }

        $mysqli->close();

        return $serieCreated;
        
    }

    function deleteSerie($idSerie) {
		
		$mysqli = initConnectionDb();

		$serieDeleted = false;
		if ($resultado = $mysqli->query("DELETE FROM series where id = $idSerie")) {

			$mysqli->query("DELETE FROM serie_actors where serie_id = $idSerie");

            $mysqli->query("DELETE FROM serie_series where serie_id = $idSerie");

			$serieDeleted = true;
		}

		$mysqli->close();

		return $serieDeleted;
	}

    function getSerieData($idSerie){

        $mysqli = initConnectionDb();
		$serieData = $mysqli->query("SELECT * FROM series WHERE id=$idSerie");
		$serieObject = null;
		foreach($serieData as $serieItem) {
			$serieObject = new Serie($serieItem['id'], $serieItem['title'],$serieItem['platform'],$serieItem['director']);
			break;
		}
		$mysqli->close();
		return $serieObject;
    }

    function updateSerie($serieId,$serieTitle,$seriePlatform,$serieDirector,$serieActors,$serieAudios,$serieSubtitles){

        $mysqli = initConnectionDb();


		$serieEdited = false;

	   	if ($resultadoUpdate = $mysqli->query("UPDATE series set title = '$serieTitle',platform='$seriePlatform',director='$serieDirector' where id =  $serieId")) {
			$serieEdited = true;
		}

		$mysqli->close();

		return $serieEdited;

    }


?>