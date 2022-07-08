<?php
   	require_once('../../controllers/ActorController.php');
    require_once('../../controllers/NationalityController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crear Actor</title>
    </head>
    <body>
        <div class="container">
            <?php
                $sendData = false;
                $actorCreated = false;
                if(isset($_POST['createBtn'])) {
                    $sendData = true;
                }
                if($sendData) {
                    if(isset($_POST['actorName'])) {
                        $actorCreated = storeActor($_POST['actorName'],$_POST['actorSurnames'],$_POST['actorDate'],$_POST['actorNationality']);
                    }
                }

                if(!$sendData) {
            ?>
            <div class="row">
                <div class="col-12">
                    <h1>Crear Actor</h1>
                </div>
                <div class="col-12">
                    <form name="create_actor" action="" method="POST">
                        <div class="mb-3">
                            <label for="actorName" class="form-label">Nombre del actor</label>

                            <input id="actorName" name="actorName" type="text" placeholder="Introduce el nombre del actor" class="form-control" required/>
                            <label for="actorSurnames" class="form-label">Apellidos del actor</label>
                            <input id="actorSurnames" name="actorSurnames" type="text" placeholder="Introduce los apellidos del actor" class="form-control" required/>
                            <label for="actorDate" class="form-label">Fecha nacimiento</label>
                            <input id="actorDate" name="actorDate" type="date" placeholder="Introduce la fecha de nacimiento" class="form-control" required/>
                            <label for="actorNationality" class="form-label">Nacionalidad</label>
                            <select class="form-select" name="actorNationality" id="actorNationality">
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
                    if ($actorCreated) {
                        ?>
                        <div class="row">
                            <div class="alert alert-success" role="alert">
                                Actor creado correctamente.<br><a href="list.php">Volver al listado de actores.</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="alert alert-danger" role="alert">
                                El actor no se ha creado correctamente.<br><a href="create.php">Volver a intentarlo.</a>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>

    </body>
</html>
