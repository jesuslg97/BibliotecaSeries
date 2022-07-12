<?php

    function initConnectionDb() {
            $db_host = 'localhost';
            $db_user = 'root';
            $db_password = 'root';
            $db_db = 'actividad_1';
            $port = 3308;

            $mysqli = @new mysqli(
                $db_host,
                $db_user,
                $db_password,
                $db_db,
                $port
            );

            if ($mysqli->connect_error) {
                die('Error: '.$mysqli->connect_error);
            }

            return $mysqli;
        }

?>