<?php

namespace DAO;

use DAO\ICompanyDAO as ICompanyDAO;
use Classes\Company as Company;

class CompanyDAO implements ICompanyDAO
{
    private $companyList = array();
    private $fileName = ROOT . "Data/companies.json";

    function Add(Company $company)
    {
        $this->RetrieveData();

        $company->setId($this->GetNextId());

        array_push($this->companyList, $company);

        $this->SaveData();
    }

    function GetAll()
    {
        $this->RetrieveData();

        return $this->companyList;
    }

    function getByCuil($cuil)
    {
        $company = null;

        $this->RetrieveData();

        $company = array_filter($this->companyList, function ($company) use ($cuil) {
            return $company->getLegalName() == $cuil;
        });

        $company = array_values($company); //Reordering array indexes

        return (count($company) > 0) ? $company[0] : null;
    }

    function Remove($cuil)
    {
        $this->RetrieveData();

        $this->companyList = array_filter($this->companyList, function ($company) use ($cuil) {
            return $company->getCUIL() != $cuil;
        });

        $this->SaveData();
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

        foreach ($this->companyList as $company) {
            $id = ($company->getId() > $id) ? $company->getId() : $id;
        }

        return $id + 1;
    }
}
