<?php
    require_once('../../controllers/DirectorController.php');
    require_once('../../controllers/NationalityController.php');
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="UTF-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Editar director</title>
    </head>
    
    <body>
        <div class="container">
            <?php
            $iddirector = $_GET['id'];
            $directorObject = getDirectorData($iddirector);

            $sendData = false;
            $directorEdited = false;
            if(isset($_POST['editBtn'])) {
                $sendData = true;
            }
            if($sendData) {
                if(isset($_POST['directorName'])) {
                    
                    $directorEdited = updateDirector($_POST['directorId'],$_POST['directorName'],$_POST['directorSurnames'],$_POST['directorDate'],$_POST['directorNationality']);
                }
            }

            if(!$sendData) {
                ?>
                <div class="row">

                    <div class="col-12 text-center mt-3">
                        <h1>Editar Director</h1>
                    </div>

                    <div class="offset-md-4 col-4 mt-3">
                        <form name="create_director" action="" method="POST">
                            <div class="mb-3">
                                <label for="directorName" class="form-label">Nombre idioma</label>
                                <input id="directorName" name="directorName" type="text" placeholder="Introduce el nombre del idioma" class="form-control mb-3" required value="<?php if(isset($directorObject)) echo $directorObject->getName(); ?>"/>

                                <label for="directorSurnames" class="form-label">Apellidos del director</label>
                                <input id="directorSurnames" name="directorSurnames" type="text" placeholder="Introduce los apellidos del director" class="form-control mb-3" required value="<?php if(isset($directorObject)) echo $directorObject->getSurnames(); ?>"/>

                                <label for="directorDate" class="form-label">Fecha nacimiento</label>
                                <input id="directorDate" name="directorDate" type="date" placeholder="Introduce la fecha de nacimiento" class="form-control mb-3" required value="<?php if(isset($directorObject)) echo $directorObject->getDate(); ?>"/>

                                <label for="directorNationality" class="form-label">Nacionalidad</label>
                                <select class="form-select" name="directorNationality" id="directorNationality">
                                <option value="0">Selecciona un pais</option>
                                <?php 
                                    $nationalitiesList = listNationalities();
                                    foreach($nationalitiesList as $nationality) {
                                ?>
                                        <?php if(isset($directorObject) && ($nationality->getId() == $directorObject->getNationality())){ ?>
                                            <option selected value=<?php echo $nationality->getId();?>><?php echo $nationality->getName()?></option>
                                        <?php 
                                            }else{
                                        ?> 
                                        <option value=<?php echo $nationality->getId();?>><?php echo $nationality->getName()?></option>
                                        <?php
                                            }
                                        ?>
                                <?php       
                                    }
                                ?>
                                <input type="hidden" name="directorId" value="<?php echo $iddirector; ?>"/>
                            </div>

                            <div class="text-center">
                                <input type="submit" value="Editar" class="btn btn-primary" name="editBtn"/>
                                <a class="btn btn-warning text-white" href="list.php">Volver</a>
                            </div>

                        </form>
                    </div>
                </div>
                <?php
            } else {
                if ($directorEdited) {
                    ?>
                    <div class="row">
                        <div class="alert alert-success mt-3" role="alert">
                            Director editado correctamente.<br><a href="list.php">Volver al listado de directores.</a>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="alert alert-danger mt-3" role="alert">
                            El director no se ha editado correctamente.<br><a href="edit.php?id=<?php echo $iddirector;?>">Volver a intentarlo.</a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </body>
</html>
