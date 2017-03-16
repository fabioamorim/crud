<?php

    $dbname = 'crud';
    $host = 'localhost';
    $user = 'root';
    $password = '';

    $conn = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$password) or print(mysql_error());