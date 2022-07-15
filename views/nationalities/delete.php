<?php
    require_once('../../controllers/NationalityController.php');
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Borrar pais</title>
    </head>
    <body>
        <div class="container">
            <?php
                
                $idNationality = $_POST['nationalityId'];
                $plaformDeleted = deleteNationality($idNationality);

                if($plaformDeleted) {

                    ?>
                    <div class="row">
                        <div class="alert alert-success mt-3" role="alert">
                            Pais borrado correctamente.<br><a href="list.php">Volver al listado de paises.</a>
                        </div>
                    </div>
                    <?php
                } else {     
                    ?>
                    <div class="row">
                        <div class="alert alert-danger mt-3" role="alert">
                            El pais no se ha borrado correctamente.<br><a href="list.php">Volver a intentarlo.</a>
                        </div>
                    </div>
                <?php
                }
                ?>
        </div>
    </body>
</html>
