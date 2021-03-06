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

        <title>Listado de series</title>
    </head>

    <body>
    <div class="container">
        <div class="row">

            <div class="col-12 text-center mt-3">
                <h1>Listado de series</h1>
            </div>

            <div class="col-12">
                <?php
                
                    $seriesList = listSeries();
                    
                    if(count($seriesList) > 0) {
                ?>
                <table class="table text-center mt-3">
                    <thead>
                        <th>Titulo</th>
                        <th>Plataforma</th>
                        <th>Director</th>
                        <th>Actores</th>
                        <th>Audio</th>
                        <th>Subtitulos</th>
                        <th colspan="2">Acciones</th>

                    </thead>

                    <tbody>
                        <?php
                            foreach($seriesList as $serie) {
                               
                        ?>
                            <tr>
                                <td><?php echo $serie->getTitle();?></td>

                                <?php
                                    $platformObject = getPlatformData($serie->getPlatform());
                                ?>
                                <td><?php if(isset($platformObject)) echo $platformObject->getName(); ?></td>



                                <?php
                                    $directorObject = getDirectorData($serie->getDirector());
                                ?>
                                <td><?php if(isset($directorObject)) echo $directorObject->getName().' '.$directorObject->getSurnames(); ?></td>
                                
                               
                                <td>
                                    <select class="form-select" name="actors" id="actors">
                                        <?php
                                        
                                            $actorObject = getSerieActor($serie->getId());
                                            foreach($actorObject as $actor){   
                                            
                                        ?>

                                            <option value=<?php echo $actor->getId();?>><?php echo $actor->getName().' '. $actor->getSurnames()?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-select" name="audio" id="audio">
                                        <?php
                                        
                                            $audioObject = getSerieAudio($serie->getId());
                                            foreach($audioObject as $audio){   
                                                   
                                        ?>

                                            <option value=<?php echo $audio->getId();?>><?php echo $audio->getName()?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-select" name="subtitles" id="subtitles">
                                        <?php
                                        
                                            $subtitleObject = getSerieSubtitles($serie->getId());
                                            foreach($subtitleObject as $subtitle){   
                                                   
                                        ?>

                                            <option value=<?php echo $subtitle->getId();?>><?php echo $subtitle->getName()?></option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="series">
                                        <a class="btn btn-success m-1" href="edit.php?id=<?php echo $serie->getId();?>">Editar</a>
                                        &nbsp;&nbsp;
                                        <form name="delete_series" action="delete.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="serieId" value="<?php echo $serie->getId();?>" />
                                            <button type="submit" class="btn btn-danger m-1" onclick = "return confirm('??Realmente desea eliminar?')">Borrar</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <?php
                    } else {
                ?>
                <div class="alert alert-warning" role="alert">
                  A??n no existen series.
                </div>
                <?php
                    }
                ?>
            </div>

            <div class="col-12 text-center">
                <a class="btn btn-primary" href="create.php">+ Crear serie</a>
                <a class="btn btn-warning text-white" href="../../index.html">Volver</a>
            </div>

        </div>
    </div>

  </body>
</html>
