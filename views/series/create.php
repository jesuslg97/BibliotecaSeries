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

        <title>Crear Serie</title>
    </head>

    <body>
        <div class="container">
            <?php
                $sendData = false;
                $serieCreated = false;
                if(isset($_POST['createBtn'])) {
                    $sendData = true;
                }
                if($sendData) {
                    if(isset($_POST['serieTitle'])) {
                        $serieCreated = storeSerie($_POST['serieTitle'],$_POST['seriePlatform'],$_POST['serieDirector'],$_POST['serieActors'],$_POST['serieAudios'],$_POST['serieSubtitles']);
                    }
                }

                if(!$sendData) {
            ?>
            <div class="row">

                <div class="col-12 text-center mt-3">
                    <h1>Crear Serie</h1>
                </div>

                <form name="create_serie" action="" method="POST">
                    <div class="row col-12">

                        <div class="col-4 mt-3">
                            <label for="serieTitle" class="form-label">Nombre del serie</label>
                            <input id="serieTitle" name="serieTitle" type="text" placeholder="Introduce el titulo de la serie" class="form-control mb-3" required/>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="seriePlatform" class="form-label">Plataforma</label>
                            <select class="form-select mb-3" name="seriePlatform" id="seriePlatform">
                                <option value="0">Selecciona una plataforma</option>
                                <?php
                                $platformsList = listPlatforms();
                                foreach($platformsList as $platform) {
                                    ?>
                                    <option value=<?php echo $platform->getId();?>><?php echo $platform->getName()?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="serieDirector" class="form-label">Director</label>
                            <select class="form-select mb-3" name="serieDirector" id="serieDirector">
                                <option value="0">Selecciona un director</option>
                                <?php
                                $directorsList = listDirectors();
                                foreach($directorsList as $director) {
                                    ?>
                                    <option value=<?php echo $director->getId();?>><?php echo $director->getName().' '.$director->getSurnames()?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="serieActors" class="form-label">Actores</label>
                            <select multiple class="form-select mb-3" name="serieActors[]" id="serieActors">
                                <?php
                                $actorsList = listActors();
                                foreach($actorsList as $actor) {
                                    ?>
                                    <option value=<?php echo $actor->getId();?>><?php echo $actor->getName().' '.$actor->getSurnames()?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="serieAudios" class="form-label">Audio</label>
                            <select multiple class="form-select mb-3" name="serieAudios[]" id="serieAudios">
                                <?php
                                $languagesList = listLanguages();
                                foreach($languagesList as $language) {
                                    ?>
                                    <option value=<?php echo $language->getId();?>><?php echo $language->getName()?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="serieSubtitles" class="form-label">Subtitulos</label>
                            <select multiple class="form-select" name="serieSubtitles[]" id="serieSubtitles">
                                <?php
                                $languagesList = listLanguages();
                                foreach($languagesList as $language) {
                                    ?>
                                    <option value=<?php echo $language->getId();?>><?php echo $language->getName()?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Crear" class="btn btn-primary" name="createBtn"/>
                        <a class="btn btn-warning text-white" href="list.php">Volver</a>
                    </div>
                </form>
            </div>
            <?php
                } else {
                    if ($serieCreated) {
                        ?>
                        <div class="row">
                            <div class="alert alert-success mt-3" role="alert">
                                Serie creado correctamente.<br><a href="list.php">Volver al listado de series.</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="alert alert-danger mt-3" role="alert">
                                La serie no se ha creado correctamente.<br><a href="create.php">Volver a intentarlo.</a>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>

    </body>
</html>
