<?php
            $servername = 'localhost';
            $username = 'root';
            $passward = '';
            $database = 'commonplace_library';

            $conn = new mysqli($servername, $username, $passward, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

?>