<?php
   	require_once('../../controllers/LanguagesController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crear idioma</title>
    </head>
    <body>
        <div class="container">
            <?php
                $sendData = false;
                $languageCreated = false;
                if(isset($_POST['createBtn'])) {
                    $sendData = true;
                }
                if($sendData) {
                    if(isset($_POST['languageName'])) {
                        $languageCreated = storeLanguage($_POST['languageName'],$_POST['languageISO']);
                    }
                }

                if(!$sendData) {
            ?>
            <div class="row">
                <div class="col-12">
                    <h1>Crear idioma</h1>
                </div>
                <div class="col-12">
                    <form name="create_language" action="" method="POST">
                        <div class="mb-3">
                            <label for="languageName" class="form-label">Nombre idioma</label>

                            <input id="languageName" name="languageName" type="text" placeholder="Introduce el nombre del lenguage" class="form-control" required/>
                            <label for="iso" class="form-label">Codigo ISO</label>
                            <input id="languageISO" name="languageISO" type="text" placeholder="Introduce el codigo ISO" class="form-control" required/>
                        </div>
                        <input type="submit" value="Crear" class="btn btn-primary" name="createBtn"/>
                    </form>
                </div>
            </div>
            <?php
                } else {
                    if ($languageCreated) {
                        ?>
                        <div class="row">
                            <div class="alert alert-success" role="alert">
                                Idioma creado correctamente.<br><a href="list.php">Volver al listado de idiomas.</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="alert alert-danger" role="alert">
                                El idioma no se ha creado correctamente.<br><a href="create.php">Volver a intentarlo.</a>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>

    </body>
</html>