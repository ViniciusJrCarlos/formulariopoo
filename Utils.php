<?php

    class Utils
    {

        public function getConfigVars()
        {

            $arquivo = file("config/properties.ini");

            $configVars = array();

            // le o arquivo linha por linha

            for($i = 0; $i < count($arquivo); $i++)
            {
                //captura a posicao do sinal

                $equals = strpos($arquivo[$i], '=');

                //captura o nome da variavel
                $varName = substr($arquivo[$i], 0, $equals);

                $varValue = substr($arquivo[$i], $equals+1, strlen($arquivo[$i]) - $equals);

                //le o tamanho da linha menos o que ja foi lido até o sinal de =

                //remove as eventuais finais de linha capturados no arquivo

                $varValue = str_replace("\n", "", $varValue);
                $varValue = str_replace("\r", "", $varValue);

                $configVars[$varName] = $varValue;

            }

            return $configVars;

        }

        public function getDatabaseConnection()
        {

                $configVars = $this->getConfigVars();

        

        $dbTempAddress = $configVars["DB_ADDRESS"];
        $dbTempPort = $configVars["DB_PORT"];
        $dbTempUser = $configVars["DB_USER"];
        $dbTempPassword = $configVars["DB_PASSWORD"];
        $dbTempName = $configVars["DB_NAME"];
        $dbTemp = null;
        $dbTempType = "MYSQL";

        if($dbTempType == "MYSQL")
        
            $dbTemp = new MySQL();

        else if ($dbTempType == "PostgreSQL")
            $dbTemp = new PostgreSQL();
            
        else if ($dbServer == "SQLServer" )
            $dbTemp = new SQLServer();

        if($dbTemp != null)
            $dbTemp->setConfig($dbTempAddress, $dbTempPort, $dbTempUser, $dbTempPassword, $dbTempName);

        return $dbTemp;

        

        }

    }

?>