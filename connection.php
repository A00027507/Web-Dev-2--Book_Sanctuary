<?php
            $servername = 'localhost';
            $username = 'root';
            $passward = '';
            $database = 'project_database_WD2';

            $conn = new mysqli($servername, $username, $passward, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

?>