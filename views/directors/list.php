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

        <title>Listado de directores</title>
    </head>

    <body>
    <div class="container">
        <div class="row">

            <div class="col-12 text-center mt-3">
                <h1>Listado de directores</h1>
            </div>

            <div class="col-12">
                <?php
                
                    $directorsList = listDirectors();
                    
                    if(count($directorsList) > 0) {
                ?>
                <table class="table text-center mt-3">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Fecha nacimiento</th>
                        <th>Nacionalidad</th>
                        <th colspan="2">Acciones</th>
                    </thead>

                    <tbody>
                        <?php
                            foreach($directorsList as $director) {
                        ?>
                            <tr>
                                <td><?php echo $director->getName();?></td>
                                <td><?php echo $director->getSurnames();?></td>
                                <td>
                                    <?php
                                        $date=date_create( $director->getDate());
                                        echo date_format($date,"d/m/Y");
                                    
                                    ?>
                                </td>
                                
                                <?php
                                    $nationalityObject = getNationalityData($director->getNationality());
                                ?>
                                <td><?php if(isset($nationalityObject)) echo $nationalityObject->getName(); ?></td>
                                
                                <td>
                                    <div class="btn-group" role="group" aria-label="directors">
                                        <a class="btn btn-success m-1" href="edit.php?id=<?php echo $director->getId();?>">Editar</a>

                                        <form name="delete_directors" action="delete.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="directorId" value="<?php echo $director->getId();?>" />
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
                  A??n no existen directores.
                </div>
                <?php
                    }
                ?>
            </div>

            <div class="col-12 text-center">
                <a class="btn btn-primary" href="create.php">+ Crear director</a>
                <a class="btn btn-warning text-white" href="../../index.html">Volver</a>
            </div>

        </div>
    </div>

  </body>
</html>
