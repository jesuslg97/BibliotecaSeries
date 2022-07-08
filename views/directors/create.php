<?php
   	require_once('../../controllers/DirectorController.php');
    require_once('../../controllers/NationalityController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crear Director</title>
    </head>
    <body>
        <div class="container">
            <?php
                $sendData = false;
                $directorCreated = false;
                if(isset($_POST['createBtn'])) {
                    $sendData = true;
                }
                if($sendData) {
                    if(isset($_POST['directorName'])) {
                        $directorCreated = storeDirector($_POST['directorName'],$_POST['directorSurnames'],$_POST['directorDate'],$_POST['directorNationality']);
                    }
                }

                if(!$sendData) {
            ?>
            <div class="row">
                <div class="col-12">
                    <h1>Crear Director</h1>
                </div>
                <div class="col-12">
                    <form name="create_director" action="" method="POST">
                        <div class="mb-3">
                            <label for="directorName" class="form-label">Nombre del director</label>

                            <input id="directorName" name="directorName" type="text" placeholder="Introduce el nombre del director" class="form-control" required/>
                            <label for="directorSurnames" class="form-label">Apellidos del director</label>
                            <input id="directorSurnames" name="directorSurnames" type="text" placeholder="Introduce los apellidos del director" class="form-control" required/>
                            <label for="directorDate" class="form-label">Fecha nacimiento</label>
                            <input id="directorDate" name="directorDate" type="date" placeholder="Introduce la fecha de nacimiento" class="form-control" required/>
                            <label for="directorNationality" class="form-label">Nacionalidad</label>
                            <select class="form-select" name="directorNationality" id="directorNationality">
                                <option value="0">Selecciona un pais</option>
                            <?php 
                                $nationalitiesList = listNationalities();
                                foreach($nationalitiesList as $nationality) {
                            ?>
                                    <option value=<?php echo $nationality->getId();?>><?php echo $nationality->getName()?></option>
                            <?php       
                                }
                            ?>
                            </select>
                        </div>
                        <input type="submit" value="Crear" class="btn btn-primary" name="createBtn"/>
                    </form>
                </div>
            </div>
            <?php
                } else {
                    if ($directorCreated) {
                        ?>
                        <div class="row">
                            <div class="alert alert-success" role="alert">
                                Director creado correctamente.<br><a href="list.php">Volver al listado de directores.</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="alert alert-danger" role="alert">
                                El director no se ha creado correctamente.<br><a href="create.php">Volver a intentarlo.</a>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>

    </body>
</html>
