<?php
    require_once('../../controllers/PlatformController.php');
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="UTF-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar plataforma</title>
    </head>

    <body>
        <div class="container">
            <?php
            $idPlatform = $_GET['id'];
            $platformObject = getPlatformData($idPlatform);

            $sendData = false;
            $platformEdited = false;
            if(isset($_POST['editBtn'])) {
                $sendData = true;
            }
            if($sendData) {
                if(isset($_POST['platformName'])) {
                    $platformEdited = updatePlatform($_POST['platformId'], $_POST['platformName']);
                }
            }

            if(!$sendData) {
                ?>
                <div class="row">

                    <div class="col-12 text-center mt-3">
                        <h1>Editar plataforma</h1>
                    </div>

                    <div class="offset-md-4 col-4 mt-3">
                        <form name="create_platform" action="" method="POST">
                            <div class="mb-3">
                                <label for="platformName" class="form-label">Nombre plataforma</label>
                                <input id="platformName" name="platformName" type="text" placeholder="Introduce el nombre de la plataforma" class="form-control" required value="<?php if(isset($platformObject)) echo $platformObject->getName(); ?>"/>
                                <input type="hidden" name="platformId" value="<?php echo $idPlatform; ?>"/>
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
                if ($platformEdited) {
                    ?>
                    <div class="row">
                        <div class="alert alert-success mt-3" role="alert">
                            Plataforma editada correctamente.<br><a href="list.php">Volver al listado de plataformas.</a>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="alert alert-danger mt-3" role="alert">
                            La plataforma no se ha editado correctamente.<br><a href="edit.php?id=<?php echo $idPlatform;?>">Volver a intentarlo.</a>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </body>
</html>
