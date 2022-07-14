<?php
   	require_once('../../controllers/SerieController.php');
    require_once('../../controllers/PlatformController.php');
    require_once('../../controllers/DirectorController.php');
    require_once('../../controllers/ActorController.php');
    require_once('../../controllers/LanguagesController.php');
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="UTF-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar serie</title>
    </head>

    <body>
        <div class="container">
            <?php
            $idserie = $_GET['id'];
            $serieObject = getSerieData($idserie);

            $sendData = false;
            $serieEdited = false;
            if(isset($_POST['editBtn'])) {
                $sendData = true;
            }
            if($sendData) {
                if(isset($_POST['serieTitle'])) {
                    
                    $serieEdited = updateSerie($_POST['serieId'],$_POST['serieTitle'],$_POST['seriePlatform'],$_POST['serieDirector'],$_POST['serieActors'],$_POST['serieAudios'],$_POST['serieSubtitles']);
                }
            }

            if(!$sendData) {
                ?>
                <div class="row">

                    <div class="col-12 text-center mt-3">
                        <h1>Editar Serie</h1>
                    </div>

                    <form name="create_serie" action="" method="POST">
                        <div class="row col-12">

                            <div class="col-4 mt-3">
                                <label for="serieTitle" class="form-label">Nombre del serie</label>
                                <input id="serieTitle" name="serieTitle" type="text" placeholder="Introduce el titulo de la serie" class="form-control"  required  required value="<?php if(isset($serieObject)) echo $serieObject->getTitle(); ?>"/>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="seriePlatform" class="form-label">Plataforma</label>
                                <select class="form-select" name="seriePlatform" id="seriePlatform">
                                    <?php

                                        $platformsList = listPlatforms();
                                        foreach($platformsList as $platform){

                                    ?>
                                            <?php if(isset($serieObject) && ($platform->getId() == $serieObject->getPlatform())){ ?>
                                                <option selected value=<?php echo $platform->getId();?>><?php echo $platform->getName()?></option>
                                            <?php
                                                }else{
                                            ?>
                                                <option value=<?php echo $platform->getId();?>><?php echo $platform->getName()?></option>
                                            <?php
                                                }
                                            ?>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="serieDirector" class="form-label">Director</label>
                                <select class="form-select" name="serieDirector" id="serieDirector">
                                    <?php
                                        $directorsList = listDirectors();
                                        foreach($directorsList as $director){
                                    ?>
                                        <?php if(isset($serieObject) && ($director->getId() == $serieObject->getDirector())){ ?>
                                            <option selected value=<?php echo $director->getId();?>><?php echo $director->getName()?></option>
                                        <?php 
                                            }else{
                                        ?> 
                                            <option value=<?php echo $director->getId();?>><?php echo $director->getName()?></option>
                                        <?php
                                            }
                                        ?>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="serieActors" class="form-label">Actores</label>
                                <select multiple class="form-select" name="serieActors[]" id="serieActors">
                                    <?php
                                        $serieActorsList = getSerieActor($idserie);
                                        $actorsList = listActors();
                                        foreach($actorsList as $actor) {
                                   
                                            if(in_array($actor,$serieActorsList)){
                                            ?>
                                                <option selected value=<?php echo $actor->getId();?>><?php echo $actor->getName().' '.$actor->getSurnames()?></option>
                                            <?php
                                            }else{
                                            ?>
                                                <option value=<?php echo $actor->getId();?>><?php echo $actor->getName().' '.$actor->getSurnames()?></option>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="serieAudios" class="form-label">Audio</label>
                                <select multiple class="form-select" name="serieAudios[]" id="serieAudios">
                                    <?php
                                        $serieAudiosList = getSerieAudio($idserie);
                                        $audiosList = listLanguages();
                                        foreach($audiosList as $audio) {
                                   
                                            if(in_array($audio,$serieAudiosList)){
                                            ?>
                                                <option selected value=<?php echo $audio->getId();?>><?php echo $audio->getName()?></option>
                                            <?php
                                            }else{
                                            ?>
                                                <option value=<?php echo $audio->getId();?>><?php echo $audio->getName()?></option>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="serieSubtitles" class="form-label">Subtitulos</label>
                                <select multiple class="form-select" name="serieSubtitles[]" id="serieSubtitles">
                                    <?php
                                        $serieAudiosList = getSerieSubtitles($idserie);
                                        $audiosList = listLanguages();
                                        foreach($audiosList as $audio) {
                                   
                                            if(in_array($audio,$serieAudiosList)){
                                            ?>
                                                <option selected value=<?php echo $audio->getId();?>><?php echo $audio->getName()?></option>
                                            <?php
                                            }else{
                                            ?>
                                                <option value=<?php echo $audio->getId();?>><?php echo $audio->getName()?></option>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                    ?>
                                </select>
                                <input type="hidden" name="serieId" value="<?php echo $idserie; ?>"/>
                            </div>

                            <div class="text-center mt-3">
                                <input type="submit" value="Editar" class="btn btn-primary" name="editBtn"/>
                                <a class="btn btn-warning text-white" href="list.php">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            } else {
                if ($serieEdited) {
                    ?>
                    <div class="row">
                        <div class="alert alert-success mt-3" role="alert">
                            Serie editado correctamente.<br><a href="list.php">Volver al listado de series.</a>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="alert alert-danger mt-3" role="alert">
                            La serie no se ha editado correctamente.<br><a href="edit.php?id=<?php echo $idserie;?>">Volver a intentarlo.</a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </body>
</html>
