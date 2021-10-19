<?php

namespace DAO;

use DAO\IAdminDAO as IAdminDAO;
use Classes\Users\Admin;

class AdminDAO implements IAdminDAO
{
    private $AdminList = array();
    private $fileName = ROOT . "Data/admins.json";

    public function GetByEmail($email)
    {
        $Admin = null;

        $this->RetrieveData();

        $Admins = array_filter($this->AdminList, function ($Admin) use ($email) {
            return $Admin->getEmail() == $email;
        });

        $Admins = array_values($Admins); //Reordering array indexes

        return (count($Admins) > 0) ? $Admins[0] : null;
    }

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->AdminList;
    }

    private function RetrieveData()
    {
        $this->AdminList = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();

            foreach ($contentArray as $content) {
                $Admin = new Admin();
                $Admin->setEmail($content["email"]);
                $Admin->setUserType("admin");
                array_push($this->AdminList, $Admin);
            }
        }
    }
}
