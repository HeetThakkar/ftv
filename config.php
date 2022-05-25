<?php

/**********************************************************************

 *Contains all the basic Configuration

 *dbHost = Host of your MySQL DataBase Server... Usually it is localhost

 *dbUser = Username of your DataBase

 *dbPass = Password of your DataBase

 *dbName = Name of your DataBase

 **********************************************************************/

$dbHost = 'localhost';

$dbUser = 'brand_ftv';

$dbPass = '!O;_Zz{n_-c]';

$dbName = 'brand_ftv';

$dbC = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName)

        or die('Error Connecting to MySQL DataBase');

?>