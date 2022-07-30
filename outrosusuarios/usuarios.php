<?php

    include_once("../OpenConexaoClass.php");
    include_once("../Utils.php");

    $utils = new Utils();
    $db = $utils->getDatabaseConnection();

    $db->connect();
    $db->executeCommand("select * from usuarios_poo ");
    while($tbl = $db->getNextResultSetPosition())
        echo $tbl["usuario"]."<BR>";
    $db->disconnect();


?>  