<?php

Class Usuario
{

    private $internalID;
    private $fullName;
    private $userName;
    private $email;
    private $birthday;
    private $sex;
    private $passwordHash;



    public function setDataFromRS($resultSet)
    {

        $this->internalID =   $resultSet["ID"];
        $this->fullName =     $resultSet["FULLNAME"];
        $this->userName =     $resultSet["USERNAME"];
        $this->email =        $resultSet["EMAIL"];
        $this->birthday =     $resultSet["BIRTHDAY"];
        $this->sex =          $resultSet["SEX"];
        $this->passwordHash = $resultSet["PASSWORD_HASH"];



    }

    public function setFullName($fullName)
    {

        if(strlen($fullName) < 5 || strlen($fullName) > 64)
        return FALSE;

        $this->setFullName = $fullName;
        return TRUE;

    
    }

    public function setUserName($userName)
    {   

        if(strlen($userName) < 3 || strlen($userName) > 16)

        return FALSE;

        $this->userName = $userName;
        return TRUE;

    }


    public function setEmail($email)
    {


        $regex = "/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9]+\.[a-z]{2,30}$/";

        if(!preg_match($regex, $email) || strlen($email) > 128)
        return FALSE;

        $this->email = $email;
        return TRUE;

    }
    
    public function setBirthday($day, $month, $year)
    {

        if(!checkdate($month, $day, $year))
        return FALSE;

        $this->Birthday = mktime(0, 0, 0, $month, $day, $year);
        return TRUE;

    }

    public function setSex($sex)
    {

        if($sex != "masculino" && $sex != "feminino")
        return FALSE;

        $this->sex = $sex;
        return TRUE;

    }

    public function setPasswordHash($passwordHash)
    {

        if(strlen($passwordHash) < 5 || strlen($passwordHash) > 16)
        return FALSE;

        $this->passwordHash = md5($passwordHash);
        return TRUE;
    }

    //conjuntos de getters

    public function getInternalID()
    { return $this->internalID; }

    public function getFullName()
    { return $this->fullName; }

    public function getUserName()
    { return $this->userName; }

    public function getEmail()
    { return $this->email; }

    public function getBirthday()
    { return $this->birthday; }

    public function getSex()
    { return $this->sex; }

    public function getPasswordHash()
    { return $this->passwordHash; }
}

?>