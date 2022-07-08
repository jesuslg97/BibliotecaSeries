<?php
    require_once('../../controllers/NationalityController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crear pais</title>
    </head>
    <body>
        <div class="container">
            <?php
                $sendData = false;
                $nationalityCreated = false;
                if(isset($_POST['createBtn'])) {
                    $sendData = true;
                }
                if($sendData) {
                    if(isset($_POST['nationalityName'])) {
                        $nationalityCreated = storeNationality($_POST['nationalityName']);
                    }
                }

                if(!$sendData) {
            ?>
            <div class="row">
                <div class="col-12">
                    <h1>Crear pais</h1>
                </div>
                <div class="col-12">
                    <form name="create_nationality" action="" method="POST">
                        <div class="mb-3">
                            <label for="nationalityName" class="form-label">Nombre pais</label>
                            <input id="nationalityName" name="nationalityName" type="text" placeholder="Introduce el nombre del pais" class="form-control" required/>
                        </div>
                        <input type="submit" value="Crear" class="btn btn-primary" name="createBtn"/>
                    </form>
                </div>
            </div>
            <?php
                } else {
                    if ($nationalityCreated) {
                        ?>
                        <div class="row">
                            <div class="alert alert-success" role="alert">
                                Pais creado correctamente.<br><a href="list.php">Volver al listado de paises.</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="alert alert-danger" role="alert">
                                El pais no se ha creado correctamente.<br><a href="create.php">Volver a intentarlo.</a>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>

    </body>
</html>
