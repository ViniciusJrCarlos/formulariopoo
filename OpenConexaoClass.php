<?php

    include_once("conexao.php");

    class OpenConexaoClass extends Conexao
    {

        public function setConfig($server, $port, $user, $password, $db)
        {

            $this->server = $server;
            $this->port = $port;
            $this->user = $user;
            $this->password = $password;
            $this->db = $db;

        }

        public function connect()
        {

            $address = $this->server;
            if($this-> != "")
            {

                $address .= ":".$this->port;

            }

            $this->connection = mysqli_connect($address, $this->user, $this->password, $this->db)
            or die ('Não foi possivel conectar: '. mysqli_error($this->connection));



        }

        public function disconnect()
        {

            if($this->connection)
            {

                mysqli_close($this->connection);

            }

        }

        public function executeCommand($sql)
        {

            if($this->connection)
            {

                $this->resultSet = mysqli_query($this->connection, $sql);


            }
            else
            {

                return FALSE;

            }

        }

        public function getNextResultSetPosition()
        {

            return mysqli_fetch_array($this->resultSet);

        }

        public function getAffectedRows()
        {

            return mysqli_affected_rows($this->connection);

        }

        public function getError()
        {
            return mysqli_error($this->connection);

        }

    }

?>