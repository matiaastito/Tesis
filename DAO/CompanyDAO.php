<?php

namespace DAO;


use \Exception as Exception;
use DAO\ICompanyDAO as ICompanyDAO;
use Classes\Company as Company;
use DAO\Connection as Connection;

class CompanyDAO implements ICompanyDAO
{
    private $companyList = array();
    private $fileName = ROOT . "Data/companies.json";
    private $tableName = "company";

    private function checkByCUIL($CUIL)
    {

        foreach ($this->companyList as $company) {
            if ($company->getCUIL() == $CUIL) {
                return FALSE;
            }
        }
        return true;
    }

    public function Add(Company $company)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (id, cuil, legal_name, address, contact_number, email) VALUES (:id, :cuil, :legal_name, :address, :contact_number, :email);";

            $parameters["id"] = $this->GetNextId();
            $parameters["cuil"] = $company->getCUIL();
            $parameters["legal_name"] = $company->getLegalName();
            $parameters["address"] = $company->getAddress();
            $parameters["contact_number"] = $company->getContactNumber();
            $parameters["email"] = $company->getEmail();


            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }



    public function GetAll()
    {
        $companyList = array();
        try {

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $company = new Company();
                $company->setId($row["id"]);
                $company->setLegalName($row["legal_name"]);
                $company->setContactNumber($row["contact_number"]);
                $company->setAddress($row["address"]);
                $company->setCUIL($row["CUIL"]);
                $company->setEmail($row["email"]);



                array_push($companyList, $company);
            }

            return $companyList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function getByCuil($cuil)
    {
        $company = null;

        $this->RetrieveData();

        $company = array_filter($this->companyList, function ($company) use ($cuil) {
            return $company->getLegalName() == $cuil;
        });

        $company = array_values($company); //Reordering array indexes

        return (count($company) > 0) ? $company[0] : null;
    }

    public function Remove($cuil)
    {
        try {
            $query = "DELETE FROM $this->tableName WHERE CUIL = $cuil";
            $this->connection = Connection::GetInstance();

            $this->connection->Execute($query);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function SearchByNombre($nombre)
    {

        $companyList = array();
        try {
            $query = "SELECT * FROM $this->tableName WHERE legal_name like '$nombre%'";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            if ($resultSet != null) {
                foreach ($resultSet as $row) {
                    $company = new Company();
                    $company->setId($row["id"]);
                    $company->setLegalName($row["legal_name"]);
                    $company->setContactNumber($row["contact_number"]);
                    $company->setAddress($row["address"]);
                    $company->setCUIL($row["CUIL"]);
                    $company->setEmail($row["email"]);



                    array_push($companyList, $company);
                }
            }

            return $companyList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    private function RetrieveData()
    {
        $this->companyList = array();

        if (file_exists($this->fileName)) {
            $jsonToDecode = file_get_contents($this->fileName);

            $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();

            foreach ($contentArray as $content) {
                $company = new Company();
                $company->setId($content["id"]);
                $company->setCUIL($content["CUIL"]);
                $company->setlegalName($content["legalName"]);
                $company->setAddress($content["address"]);
                $company->setContactNumber($content["contactNumber"]);
                $company->setEmail($content["email"]);

                array_push($this->companyList, $company);
            }
        }
    }

    private function SaveData()
    {
        $arrayToEncode = array();

        foreach ($this->companyList as $company) {
            $valuesArray = array();
            $valuesArray["id"] = $company->getId();
            $valuesArray["CUIL"] = $company->getCUIL();
            $valuesArray["legalName"] = $company->getLegalName();
            $valuesArray["address"] = $company->getAddress();
            $valuesArray["contactNumber"] = $company->getContactNumber();
            $valuesArray["email"] = $company->getEmail();
            array_push($arrayToEncode, $valuesArray);
        }

        $fileContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

        file_put_contents($this->fileName, $fileContent);
    }

    private function GetNextId()
    {
        $id = 0;

        $this->companyList = $this->GetAll();

        foreach ($this->companyList as $company) {
            $id = ($company->getId() > $id) ? $company->getId() : $id;
        }

        return $id + 1;
    }
}
