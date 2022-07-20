<?php

    abstract class Conexao
    {

        protected $server;
        protected $port;
        protected $user;
        protected $password;
        protected $db;
        protected $connection;
        protected $resultSet;

        abstract public function setConfig($server, $port, $user, $password, $db);

        abstract public function connect();

        abstract public function disconnect();

        abstract public function executeCommand($sql);

        abstract public function getNextResultSetPosition();

        abstract public function getAffectedRows();

        abstract public function getError();

    }

?>