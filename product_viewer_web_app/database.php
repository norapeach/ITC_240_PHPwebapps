<?php // where the database 
    $dsn = 'mysql:host=mysql.norapeach.com;dbname=my_guitar_shop_np20';
    $username = 'npeach';
    $password = 'C0d1ng4L3b3n!';

    try { // attempt to create a new instance of PDO database reference
        // with the login credentials above; PDO object maps php to talk to DB
        $db = new PDO($dsn, $username, $password); // instance of the PHP Data Obect Class (part of PHP library)
    } catch (PDOException $e) { // if the above doesn't work, it's going to catch the PDO Exception
        $error_message = $e->getMessage(); // catches the error message
        include('database_error.php'); // saves to log file
        exit(); // exits this script
    }
?>