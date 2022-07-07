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
    <title>Listado de idiomas</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Listado de idiomas</h1>
            </div>
            <div class="col-6">
                <a class="btn btn-primary" href="create.php">+ Crear idioma</a>
            </div>
            <div class="col-12">
                <?php
                    $languagesList = listLanguages();

                    if(count($languagesList) > 0) {
                ?>
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>ISO</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php
                            foreach($languagesList as $language) {
                        ?>
                            <tr>
                                <td><?php echo $language->getId();?></td>
                                <td><?php echo $language->getName();?></td>
                                <td><?php echo $language->getIso();?></td>
                                
                                <td>
                                    <div class="btn-group" role="group" aria-label="languages">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $language->getId();?>">Editar</a>
                                        &nbsp;&nbsp;
                                        <form name="delete_languages" action="delete.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="languageId" value="<?php echo $language->getId();?>" />
                                            <button type="submit" class="btn btn-danger">Borrar</button>
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
                  Aún no existen idiomas.
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

  </body>
</html>